<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;

class LoginController extends BackendController {
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function login() {
		// if (Auth::check()) {
		// 	return redirect()->route('backend.dashboard.index');
		// }

		return view('backend.users.login');
	}
	public function postLogin(Request $request) {
		$clsUser = new UserModel();
		$validator = Validator::make($request->all(), $clsUser->RulesLogin(), $clsUser->MessagesLogin());
		if ($validator->fails()) {
			return redirect()->route('backend.users.login')->withErrors($validator)->withInput();
		}
		//last_kind insert
		$login1['username'] = $request->input('username');
		$login1['password'] = $request->input('password');
		$login1['is_delete'] = NULL;
		$login1['is_admin'] = IS_ADMIN;
		//last_kind update
		$login2['email'] = $request->input('username');
		$login2['password'] = $request->input('password');
		$login2['is_delete'] = NULL;
		$login2['is_admin'] = IS_ADMIN;
		if (Auth::attempt($login1, true) || Auth::attempt($login2, true)) {
			return redirect()->route('backend.dashboard.index');
		} else {
			Session::flash('danger', trans('common.msg_admin_login_danger'));
			return redirect()->route('backend.users.login')->withErrors($validator)->withInput();
		}
	}
	public function logout() {
		Auth::logout();
		Session::flush();
		return redirect()->route('backend.users.login');
	}
}