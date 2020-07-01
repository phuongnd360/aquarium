<?php namespace App\Http\Models;
use DB;

class SettingModel
{
    protected $table   = 'settings';
    protected $primaryKey   = 'id';   
  

    //Manage All settings
    public function getAllSetting(){
        return DB::table($this->table)->first();
    }

    //settings insert
    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    //settings update
    public function update($id, $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }

    //Frontend get settings
    public function getSetting(){
        return DB::table($this->table)->first();
    }



}