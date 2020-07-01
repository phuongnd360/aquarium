<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use Session;
use Illuminate\Http\Request;
use App\Http\Models\ContactModel;
use Illuminate\Support\Facades\Auth;

class ContactController extends BackendController
{
    /**
     * Show categories list.
     */
    public function index()
    {
        //$dataJSON = getInfoByIP('123.21.133.243');

    	$clsContact = new ContactModel();
		$contacts = $clsContact->getAllContact();
        return view('backend.contacts.index', compact('contacts'));
    }

    /**
     * Update Contact.
     */
    public function update($id, Request $request)
    {
    	$clsContact = new ContactModel();
    	
    	$data['name_en']			= $request->input('name_en');
    	$data['name_vi']			= $request->input('name_vi');
    	if(!empty($request->input('sort'))){
    		$data['sort']			= $request->input('sort');
    	}else{
    		$data['sort']			= $clsContact->getMaxSort();
    	}
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
			return redirect()->route('backend.contacts.index');
		}else{
			Session::flash('danger', trans('common.msg_admin_contact_edit_danger'));
			return redirect()->route('backend.contacts.edit',$id);
		}
    }

    /**
     * Show Contact.
     */
    public function show($id)
    {
    	$clsContact = new ContactModel();
        $data['flag_read']          = 1; //read
        $data['last_ip']            = CLIENT_IP_ADRS;
        $data['last_user']          = Auth::id();
        $data['updated_at']         = date('Y-m-d H:i:s');
        $clsContact->update($id, $data);

		$contact = $clsContact->getById($id);
		return view('backend.contacts.show', compact('contact'));
    }

    /**
     * Delete the Contact.
     */
    public function delete($id)
    {
    	$clsContact = new ContactModel();
		$contact = $clsContact->getById($id);
		return view('backend.contacts.delete', compact('contact'));
    }

    /**
     * Destroy the Contact.
     */
    public function destroy($id, Request $request)
    {
    	$clsContact = new ContactModel();
    	
    	$data['is_delete'] 			= DELETE;
		$data['last_ip'] 			= CLIENT_IP_ADRS;
		$data['last_user'] 			= Auth::id();
		$data['updated_at'] 		= date('Y-m-d H:i:s');

		if($clsContact->update($id, $data)){
			Session::flash('success_delete', trans('common.msg_admin_contact_delete_success'));
			return redirect()->route('backend.contacts.index');
		}else{
			Session::flash('danger_delete', trans('common.msg_admin_contact_delete_danger'));
			return redirect()->route('backend.contacts.delete',$id);
		}
    }
}
