<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use Session;
use Illuminate\Http\Request;
use App\Http\Models\SettingModel;
use Illuminate\Support\Facades\Auth;

class SettingController extends BackendController
{
    /**
     * Show settings list.
     */
    public function index()
    {
    	$clsSetting = new SettingModel();
		$setting = $clsSetting->getAllSetting();
        return view('backend.settings.index', compact('setting'));
    }
    /**
     * Storage Setting.
     */
    public function postIndex(Request $request)
    {
    	$clsSetting = new SettingModel();
    	$data['mail_to']			= $request->input('mail_to');
    	$data['mail_cc']			= $request->input('mail_cc');
        $data['mail_bcc']           = $request->input('mail_bcc');    	
    	$data['signature']			= $request->input('signature');

        if(!empty($request->input('id'))){
            if($clsSetting->update($request->input('id'), $data)){
                Session::flash('success', trans('common.msg_admin_setting_save_success'));
            }
        }else{
           if($clsSetting->insert($data)){
                Session::flash('success', trans('common.msg_admin_setting_save_success'));
            }
        }	

        return redirect()->route('backend.settings.index');
    }
    
}
