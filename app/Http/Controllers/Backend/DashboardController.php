<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Models\UserModel;
use App\Http\Models\ProductModel;
use App\Http\Models\ContactModel;

class DashboardController extends BackendController {

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
		$clsUser = new UserModel();
		$countUsers = count($clsUser->getAllUser());

		$clsProduct = new ProductModel();
        $countProd = count($clsProduct->getAllPro());

        $clsContact = new ContactModel();
		$countContact = count($clsContact->getAllContact());

		return view('backend.dashboard.index', compact('countUsers', 'countProd', 'countContact'));
	}
}
