<?php namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Models\ProductModel;
use App\Http\Models\ContactModel;
use App\Http\Models\SettingModel;
use Illuminate\Http\Request;
use Session;
use Mail;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class ContactController extends FrontendController
{
    use SEOToolsTrait;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){
        $this->seo()->setTitle('Contact Us - XANH TUOI TROPICAL FISH CO.,LTD - XANH TUOI AQUARIUM');
        $this->seo()->setDescription('Contact Us - XANH TUOI TROPICAL FISH CO.,LTD is a leading exporter of tropical ornamental fish, marine fish, fresh water fish &amp; marine invertebrates, clams, corals in Vietnam. We export a wide variety of live tropical ornamental fish, clams, corals to our customers in more than 40 countries world wide');
        $this->seo()->opengraph()->setUrl('https://xanhtuoitropicalfish.com');
        $this->seo()->opengraph()->addProperty('type', 'XanhTuoiAquarium');
        $this->seo()->twitter()->setSite('@xanhtuoi');
        $this->seo()->jsonLd()->setType('XanhTuoiAquarium');

        $clsProduct = new ProductModel();
        $products = $clsProduct->frontAllPro(true);
        if ($request->session()->has('contact')) {
            $request->session()->forget('contact');
        }
        return view('frontend.contacts.index',compact('products'));
    }

    public function postIndex(Request $request){
        $clsProduct = new ProductModel();
        $clsContact = new ContactModel();
		$products = $clsProduct->frontAllPro(true);

        $data['name']           = $request->input('name');
        $data['email']          = $request->input('email');
        $data['phone']          = $request->input('phone');
        $data['content']        = $request->input('content');
        $data['lang']           = app()->getLocale();
        $data['ip_address']     = CLIENT_IP_ADRS;
        $data['last_ip']        = CLIENT_IP_ADRS;
        $data['created_at']     = date('Y-m-d H:i:s');
        $data['updated_at']     = date('Y-m-d H:i:s');

        if($clsContact->insert($data)){
            $this->send($data, $products);
			return view('frontend.contacts.sent');
        }else{
            return view('frontend.contacts.index',compact('products'));
        }
    }

    function send($data){
        $clsSetting = new SettingModel();
        $setting = (array) $clsSetting->getSetting();
	/*	$setting['mail_to'] = json_encode(array_values(explode(',', $setting['mail_to'])));
        $setting['mail_cc'] = json_encode(array_values(explode(',', $setting['mail_cc'])));
        $setting['mail_bcc'] = json_encode(array_values(explode(',', $setting['mail_bcc']))); */

		if(!empty( $setting)){
            $data = array_merge($data, $setting);
        }
        //Send to Host
       if(!Mail::send(['html' => 'frontend.contacts.host_mail'], $data, function($message) use ($data){
            if(!empty($data['email'])){
                $message->from(trim($data['email']), $data['name']);
            }
            if(!empty($data['mail_to'])){
                $message->to($data['mail_to'], HOST_EMAIL_NAME_TO);
            }else{
                $message->to(HOST_EMAIL_ADRS_TO, HOST_EMAIL_NAME_TO);
            }
            if(!empty($data['mail_cc'])){
                $message->cc($data['mail_cc'], HOST_EMAIL_NAME_TO);
            }
            if(!empty($data['mail_bcc'])){
                $message->bcc($data['mail_bcc'], HOST_EMAIL_NAME_TO);
            }
            
            $message->subject(HOST_EMAIL_SUBJECT);
        }) );

         //Send to Guest
        if(!empty($data['email'])){
            
            if( !Mail::send(['html' => 'frontend.contacts.guest_mail'], $data, function($message) use ($data){
                $message->from(GUEST_EMAIL_ADRS_FROM, GUEST_EMAIL_NAME_FROM);
                $message->to(trim($data['email']));
                $message->subject(GUEST_EMAIL_SUBJECT);
            }) );
        }
        
    }

}
