<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;

class ErrorController extends BackendController {

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function error404() {
		return view('backend.errors.404');
	}

	public function error401() {
		return view('backend.errors.401');
	}

	public function error403() {
		return view('backend.errors.403');
	}

	public function error500() {
		return view('backend.errors.500');
	}

	public function error503() {
		return view('backend.errors.503');
	}
}
