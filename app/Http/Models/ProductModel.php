<?php namespace App\Http\Models;
use DB;

class ProductModel
{
    protected $table   = 'products';
    protected $primaryKey   = 'id';

    //Manage All products
    public function getAllPro($cat=null){

        $sql = DB::table($this->table)->whereNull('products.is_delete');
        if(!empty($cat)){
            $sql = $sql->where('cat_id', '=', $cat);
        }

        $sql = $sql->leftJoin('categories', 'products.cat_id', '=', 'categories.id')->select('products.*', 'categories.name_en as cat_name_en');

        return $sql->orderBy('products.sort', 'asc')->orderBy('products.updated_at', 'desc')->get();
    }

    //products insert
    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    //products get by id
    public function getById($id)
    {
        $sql = DB::table($this->table)->whereNull('products.is_delete')->where('products.id', $id);
        $sql = $sql->leftJoin('categories', 'products.cat_id', '=', 'categories.id')
        ->select('products.*', 'categories.name_en as cat_name_en');
        return $sql->first();
    }

    //products update
    public function update($id, $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }    

    public function getMaxSort(){
        $tmpArr = DB::table($this->table)
                            ->whereNull('is_delete')
                            ->select(\DB::raw("MAX(sort) AS max_sort"))
                            ->first();
        return !empty($tmpArr->max_sort) ? ($tmpArr->max_sort + 1) : 1;
    }

    public function getAllGellery(){
        return DB::table($this->table)->whereNull('is_delete')
                                      ->whereNotNull('gallery')->orderBy('updated_at', 'desc')->get();
    }

    //Frontend All Products
    public function frontAllPro($top_page=false){

        $sql = DB::table($this->table)->whereNull('products.is_delete')->whereNull('products.status');

        if($top_page){
           $sql = $sql->where('products.top_page', 1); 
        }

        $sql = $sql->leftJoin('categories', 'products.cat_id', '=', 'categories.id')->select('products.*', 'categories.name_en as cat_name_en');

        return $sql->orderBy('products.sort', 'asc')->orderBy('products.updated_at', 'desc')->paginate(18);
    }

    //Frontend product get by id
    public function getfById($id)
    {
        $sql = DB::table($this->table)->whereNull('products.is_delete')->where('products.id', $id)->whereNull('products.status');
        $sql = $sql->leftJoin('categories', 'products.cat_id', '=', 'categories.id')
        ->select('products.*', 'categories.name_en as cat_name_en');
        return $sql->first();
    }

    //Frontend All Products
    public function getfProByCat($cat_id){
        $sql = DB::table($this->table)->whereNull('products.is_delete')->whereNull('products.status');
        if($cat_id){
           $sql = $sql->where('products.cat_id', '=', $cat_id); 
        }        
        return $sql->orderBy('products.sort', 'asc')->orderBy('products.updated_at', 'desc')->get();
    }

    public static function getfSlider(){
        $sql = DB::table('products')->whereNull('products.is_delete')->whereNull('products.status');             
        return $sql->orderBy('products.sort', 'asc')->orderBy('products.updated_at', 'desc')->take(19)->get();
    }

    //Frontend All Products
    public static function getfAllGallery(){
        $sql = DB::table('products')->whereNull('products.is_delete')->whereNull('products.status')->where('products.gallery', 1);

        $sql = $sql->leftJoin('categories', 'products.cat_id', '=', 'categories.id')->select('products.*', 'categories.name_en as cat_name_en');

        return $sql->orderBy('products.sort', 'asc')->orderBy('products.updated_at', 'desc')->get();
    }

    public function search($keyword=''){
        $sql = DB::table('products')->whereNull('products.is_delete')->whereNull('products.status');
        if(!empty($keyword)){
            $keywords = explode(' ', $keyword);
            foreach($keywords as $words) {
                $sql = $sql->where('name_en', 'LIKE', "%{$words}%")
                ->orWhere('name_vi', 'LIKE', "%{$words}%")
                ->orWhere('name_science', 'LIKE', "%{$words}%");
            }
            return $sql->orderBy('products.sort', 'asc')->orderBy('products.updated_at', 'desc')->distinct()->get();
        }else{
            return array();
        }
        
    }

}