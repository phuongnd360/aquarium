<?php namespace App\Http\Models;
use DB;

class CategoryModel
{
    protected $table   = 'categories';
    protected $primaryKey   = 'id';   
  

    //Manage All categories
    public function getAllCat(){
        return DB::table($this->table)->whereNull('is_delete')->orderBy('sort', 'asc')->get();
    }

    //categories insert
    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    //categories get by id
    public function getById($id)
    {
        return DB::table($this->table)->whereNull('is_delete')->where('id', $id)->first();
    }

    //categories update
    public function update($id, $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }

    //categories get list categories
    public function getListCat()
    {
        return DB::table($this->table)->whereNull('is_delete')->pluck('name_en','id');
    }

    public function getMaxSort(){
        $tmpArr = DB::table($this->table)
                            ->whereNull('is_delete')
                            ->select(\DB::raw("MAX(sort) AS max_sort"))
                            ->first();
        return !empty($tmpArr->max_sort) ? ($tmpArr->max_sort + 1) : 1;
    }

    //Frontend All Categories
    public function frontAllCat(){
        return DB::table($this->table)->whereNull('is_delete')->whereNull('status')->orderBy('sort', 'asc')->get();
    }

    public function getfCatCoutPro()
    {
        return DB::table($this->table)->whereNull('categories.is_delete')
        ->rightJoin('products', 'categories.id', '=', 'products.cat_id')
        ->select('categories.id','categories.name_en','categories.name_vi', \DB::raw("COUNT(products.cat_id) AS count_pro"))->groupBy('products.cat_id')->orderBy('categories.sort', 'asc')->get();
    }

}