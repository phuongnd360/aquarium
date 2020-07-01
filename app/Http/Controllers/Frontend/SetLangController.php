<?php namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\FrontendController;
use App;
use LaravelLocalization;
use Illuminate\Http\Request;
use Session;


class SetLangController extends FrontendController
{
	public function setlang(Request $request, $locale=null){

        if(!empty($request->input('lang'))){
           $locale =  $request->input('lang');
        }

        if(isset($_SERVER['HTTP_REFERER'])) {
            $previous = $_SERVER['HTTP_REFERER'];
        }
        
        $previous = strtok($previous, "?");

		if(!empty($locale)){
            Session::put('locale', $locale);
            App::setLocale($locale);
        }else{
            Session::put('locale', 'vi');
            App::setLocale('vi');
        }

        if(!empty($_SERVER['QUERY_STRING'])) $previous .=  '?'.$_SERVER['QUERY_STRING'];

        return redirect($previous);
	}

        
}
