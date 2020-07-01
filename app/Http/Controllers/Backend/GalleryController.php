<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use Session;
use Illuminate\Http\Request;
use App\Http\Models\ProductModel;
use Illuminate\Support\Facades\Auth;

class GalleryController extends BackendController
{
    /**
     * Show gallery list.
     */
    public function index()
    {
    	$clsProduct = new ProductModel();
		$gallery = $clsProduct->getAllGellery();
        return view('backend.gallery.index', compact('gallery'));
    }

    /**
     * Update Contact.
     */
    public function update($id, Request $request)
    {
    	$clsContact = new ProductModel();   	

    	$data['seo_title']			= $request->input('seo_title');
    	$data['seo_url']			= $request->input('seo_url');
    	$data['seo_keyword']		= $request->input('seo_keyword');
    	$data['seo_description']	= $request->input('seo_description');
    	$data['status']				= $request->input('status');
    	$data['is_delete'] 			= NULL;
		$data['last_ip'] 			= CLIENT_IP_ADRS;
		$data['last_user'] 			= Auth::id();
		$data['created_at'] 		= date('Y-m-d H:i:s');
		$data['updated_at'] 		= date('Y-m-d H:i:s');

		if($clsContact->update($id, $data)){			
			Session::flash('success', trans('common.msg_admin_contact_edit_success'));
			return redirect()->route('backend.gallery.index');
		}else{
			Session::flash('danger', trans('common.msg_admin_contact_edit_danger'));
			return redirect()->route('backend.gallery.edit',$id);
		}
    }

    /**
     * Show Contact.
     */
    public function show($id)
    {
    	$clsContact = new ProductModel();
        $data['flag_read']          = 1; //read
        $data['last_ip']            = CLIENT_IP_ADRS;
        $data['last_user']          = Auth::id();
        $data['updated_at']         = date('Y-m-d H:i:s');
        $clsContact->update($id, $data);

		$contact = $clsContact->getById($id);
		return view('backend.gallery.show', compact('contact'));
    }

    /**
     * Delete the Contact.
     */
    public function delete($id)
    {
    	$clsContact = new ProductModel();
		$contact = $clsContact->getById($id);
		return view('backend.gallery.delete', compact('contact'));
    }

    /**
     * Destroy the Contact.
     */
    public function destroy($id, Request $request)
    {
    	$clsContact = new ProductModel();
    	
    	$data['is_delete'] 			= DELETE;
		$data['last_ip'] 			= CLIENT_IP_ADRS;
		$data['last_user'] 			= Auth::id();
		$data['updated_at'] 		= date('Y-m-d H:i:s');

		if($clsContact->update($id, $data)){
			Session::flash('success_delete', trans('common.msg_admin_contact_delete_success'));
			return redirect()->route('backend.gallery.index');
		}else{
			Session::flash('danger_delete', trans('common.msg_admin_contact_delete_danger'));
			return redirect()->route('backend.gallery.delete',$id);
		}
    }
}
