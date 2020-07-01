<?php namespace App\Http\Models;
use DB;

class VideoModel
{
    protected $table   = 'videos';
    protected $primaryKey   = 'id';  

    //Manage All videos
    public function getAllVideo(){
        return DB::table($this->table)->whereNull('is_delete')->orderBy('sort', 'asc')->get();
    }

    //videos insert
    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    //videos get by id
    public function getById($id)
    {
        return DB::table($this->table)->whereNull('is_delete')->where('id', $id)->first();
    }

    //videos update
    public function update($id, $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }

    //videos get list videos
    public function getListVideo()
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

    //Get list video for frontend
    public function getfVideos(){
        return DB::table($this->table)->whereNull('is_delete')->whereNull('status')->where('top_page', 1)->orderBy('sort', 'asc')->get();
    }

    public function frontAllVideo(){
        $sql = DB::table($this->table)->whereNull('videos.is_delete')->whereNull('videos.status');
        return $sql->orderBy('videos.sort', 'asc')->orderBy('videos.updated_at', 'desc')->get();
    }

}