<?php namespace App\Http\Models;
use DB;

class FacilityModel
{
    protected $table   = 'facilities';
    protected $primaryKey   = 'id';   
  

    //Manage All Facilities
    public function getAllFacility(){

        $sql = DB::table($this->table)->whereNull('facilities.is_delete');

        return $sql->orderBy('facilities.sort', 'asc')->orderBy('facilities.updated_at', 'desc')->get();
    }

    //Facilities insert
    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    //Facilities get by id
    public function getById($id)
    {
        $sql = DB::table($this->table)->whereNull('facilities.is_delete')->where('facilities.id', $id);
        return $sql->first();
    }

    //Facilities update
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

    //Frontend product get by id
    public function getfById($id)
    {
        $sql = DB::table($this->table)->whereNull('facilities.is_delete')->where('facilities.id', $id)->whereNull('facilities.status');        
        return $sql->first();
    }

    public function frontAllFacility(){
        $sql = DB::table($this->table)->whereNull('facilities.is_delete')->whereNull('facilities.status');
        return $sql->orderBy('facilities.sort', 'asc')->orderBy('facilities.updated_at', 'desc')->get();
    }

}