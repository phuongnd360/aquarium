<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Config;

class BackendController extends Controller {
	public function __construct() {
		$this->middleware('auth', ['except' => ['postLogin', 'login', 'logout','chkusers']]);

		//Define contants
		$configs = Config::get('constants.DEFINE');
		foreach ($configs as $key => $value) {
            if(!defined($key)) define($key, $value);
		}
		if(!defined('CLIENT_IP_ADRS')){
	        define('CLIENT_IP_ADRS', $this->client_adrs_ip());
	    }
	}

	function client_adrs_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        return $ipaddress;
    }

}