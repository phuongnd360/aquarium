<?php 
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\FrontendController;

class ErrorController extends FrontendController {

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function error404() {
		return view('frontend.errors.404');
	}

	public function error401() {
		return view('frontend.errors.401');
	}

	public function error403() {
		return view('frontend.errors.403');
	}

	public function error500() {
		return view('frontend.errors.500');
	}

	public function error503() {
		return view('frontend.errors.503');
	}
}
