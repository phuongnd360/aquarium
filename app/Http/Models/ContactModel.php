<?php namespace App\Http\Models;
use DB;

class ContactModel
{
    protected $table        = 'contacts';
    protected $primaryKey   = 'id';   
  

    //Manage All contacts
    public function getAllContact(){
        return DB::table($this->table)->whereNull('is_delete')->orderBy('created_at', 'desc')->get();
    }

    //contacts insert
    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    //contacts get by id
    public function getById($id)
    {
        return DB::table($this->table)->whereNull('is_delete')->where('id', $id)->first();
    }

    //contacts update
    public function update($id, $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }

    public function getCountUnread()
    {
        return DB::table('contacts')
                            ->whereNull('is_delete')
                            ->whereNull('flag_read')
                            ->count();
    }

    public function reader($id, $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }

}