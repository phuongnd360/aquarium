<?php namespace App\Http\Models;
use DB;

class UserModel
{
    protected $table   = 'users';
    protected $primaryKey   = 'id';   

    public function Rules()
    {
        return array(
            'name'                              => 'required',
            'username'                          => 'required',
            'password'                          => 'required|min:4',
            'email'                             => 'required|email',
            //'phone'                             => 'nullable|regex:/^[0-9()-.\-\s]+$/',
        );
    }

    public function Messages()
    {
        return array(
            'name.required'                     => trans('validation.error_users_name_required'),
            'username.required'                 => trans('validation.error_users_username_required'),
            'password.required'                 => trans('validation.error_users_password_required'),
            'password.min'                      => trans('validation.error_users_password_min'),            
            'email.required'                    => trans('validation.error_users_email_required'),
            'email.email'                       => trans('validation.error_users_email_email'),
            //'phone.regex'                       => trans('validation.error_users_phone_regex'),
        );
    }

    public function RulesLogin()
    {
        return array(
            'username'                          => 'required',
            'password'                          => 'required',
        );
    }

    public function MessagesLogin()
    {
        return array(
            'username.required'                 => trans('validation.error_username_required'),
            'password.required'                 => trans('validation.error_password_required'),
        );
    }


    //Manage All Users
    public function getAllUser(){
        return DB::table($this->table)->whereNull('is_delete')->orderBy('first_name', 'ASC')->orderBy('updated_at', 'DESC')->get();
    }

    //users insert
    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    //users get by id
    public function getById($id)
    {
        return DB::table($this->table)->whereNull('is_delete')->where('id', $id)->first();
    }

    //users update
    public function update($id, $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }

    //users get list users
    public function getListUser()
    {
        return DB::table($this->table)->whereNull('is_delete')->pluk('id','first_name');
    }

}