<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;
use Hash;

class UsersController extends BackendController {

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index(){
		$clsUser = new UserModel();
		$users = $clsUser->getAllUser();
		return view('backend.users.index', compact('users'));
	}

	public function add(){
		return view('backend.users.add');
	}

	public function postAdd(Request $request){
		$clsUser = new UserModel();
		$data['first_name'] 	= $request->input('first_name');
		$data['last_name'] 		= $request->input('last_name');
		$data['username'] 		= $request->input('username');
		$data['email'] 			= $request->input('email');
		$data['password'] 		= Hash::make($request->input('password'));
		$data['roles'] 			= $request->input('roles');
		$data['status'] 		= $request->input('status');
		$data['is_admin'] 		= IS_ADMIN;
		$data['is_delete'] 		= NULL;
		$data['last_ip'] 		= CLIENT_IP_ADRS;
		$data['last_user'] 		= Auth::id();
		$data['created_at'] 	= date('Y-m-d H:i:s');
		$data['updated_at'] 	= date('Y-m-d H:i:s');
		
		if($clsUser->insert($data)){
			Session::flash('success', trans('common.msg_admin_users_add_success'));
			return redirect()->route('backend.users.index');
		}else{
			Session::flash('danger', trans('common.msg_admin_users_add_danger'));
			return redirect()->route('backend.users.add');
		}
	}

	public function edit($id){
		$clsUser = new UserModel();
		$user = $clsUser->getById($id);
		return view('backend.users.edit', compact('user'));
	}

	public function postEdit(Request $request,$id){
		$clsUser = new UserModel();
		$data['first_name'] 	= $request->input('first_name');
		$data['last_name'] 		= $request->input('last_name');
		$data['username'] 		= $request->input('username');
		$data['email'] 			= $request->input('email');
		if(!empty($request->input('password'))){
			$data['password'] 		= Hash::make($request->input('password'));
		}
		$data['roles'] 			= $request->input('roles');
		$data['status'] 		= $request->input('status');
		$data['is_admin'] 		= IS_ADMIN;
		$data['is_delete'] 		= NULL;
		$data['last_ip'] 		= CLIENT_IP_ADRS;
		$data['last_user'] 		= Auth::id();
		$data['updated_at'] 	= date('Y-m-d H:i:s');
		
		if($clsUser->update($id, $data)){
			Session::flash('success_edit', trans('common.msg_admin_users_edit_success'));
			return redirect()->route('backend.users.index');
		}else{
			Session::flash('danger_edit', trans('common.msg_admin_users_edit_danger'));
			return redirect()->route('backend.users.edit',$id);
		}
	}

	public function detail($id){
		$clsUser = new UserModel();
		$user = $clsUser->getById($id);
		return view('backend.users.detail', compact('user'));
	}

	public function delete($id){
		$clsUser = new UserModel();
		$user = $clsUser->getById($id);
		return view('backend.users.delete', compact('user'));
	}

	public function postDelete($id){
		$clsUser = new UserModel();
		$data['is_delete'] 		= DELETE;
		$data['last_ip'] 		= CLIENT_IP_ADRS;
		$data['last_user'] 		= Auth::id();		
		$data['updated_at'] 	= date('Y-m-d H:i:s');
		
		if($clsUser->update($id, $data)){			
			Session::flash('success_delete', trans('common.msg_admin_users_delete_success'));
			return redirect()->route('backend.users.index');
		}else{
			Session::flash('danger_delete', trans('common.msg_admin_users_delete_danger'));
			return redirect()->route('backend.users.delete',$id);
		}
	}

	public function chkusers(Request $request){
		if(!empty($request->input('username'))){
			$user = \App\User::where('username', urldecode($request->input('username')))->whereNull('is_delete')->first();
		    if ($user) {
		        return json_encode(false);
		    } else {
		        return json_encode(true);
		    }
		}
		if(!empty($request->input('email'))){
			$user = \App\User::where('email', urldecode($request->input('email')))->whereNull('is_delete')->first();
		    if ($user) {
		            return json_encode(false);
		    } else {
		        return json_encode(true);
		    }
		}
		
	}

	public function chkUserEdit(Request $request){
		$userOld = \App\User::where('id', $request->input('id'))->first();
		if(!empty($request->input('username'))){
			if($userOld->username == $request->input('username')) return json_encode(true);
			$user = \App\User::where('username', urldecode($request->input('username')))->whereNull('is_delete')->first();			
		    if ($user) {
		        return json_encode(false);
		    } else {
		        return json_encode(true);
		    }
		}
		if(!empty($request->input('email'))){
			if($userOld->email == $request->input('email')) return json_encode(true);
			$user = \App\User::where('email', urldecode($request->input('email')))->whereNull('is_delete')->first();
		    if ($user) {
		            return json_encode(false);
		    } else {
		        return json_encode(true);
		    }
		}
		
	}



}
