<?php
use App\Http\Models\ContactModel;
use App\Http\Models\ProductModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

if (!function_exists('put_visitor')) {

    function put_visitor()
    {
        if(file_exists(storage_path('app/visitor.txt'))){
            $countVisitor = File::get(storage_path('app/visitor.txt'));
            if($countVisitor == '') $countVisitor = 0;
            Storage::put('visitor.txt', $countVisitor + 1);
        }else{
            Storage::put('visitor.txt', 1);
        }
    }
}

if (!function_exists('tags')) {
    function tags()
    {
        if(file_exists(storage_path('app/tags.json'))){
            $data = file_get_contents(storage_path('app/tags.json'));
            return json_decode($data, true);
        }else{
            return array();
        }
    }
}

if (!function_exists('get_visitor')) {

    function get_visitor()
    {
        if(file_exists(storage_path('app/visitor.txt'))){
            $countVisitor = File::get(storage_path('app/visitor.txt'));
            if($countVisitor == '') $countVisitor = 0;
            return  $countVisitor;
        }
        return 0;   
    }
}

if (!function_exists('Roles')) {

    function Roles()
    {
        return array('1' => 'Administrator', '2' => 'Staff');  
    }
}

if (!function_exists('last_time')) {

    function last_time($datetime)
    {
        $result = '';

        if(!empty($datetime)){
            $dt = Carbon::now();
            $dt_now = $dt->toDateTimeString();
            
            $date1 = strtotime($datetime);
            $date2 = strtotime($dt_now);
           
            $diff = abs($date2 - $date1);
            
            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
            $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
            $minutes = floor(($diff - $years * 365*60*60*24 - $hours*60*60)/ 60);

            if( $years > 0 ){
              $result .=  $years; 
            }
            if( $months > 0 ){
                $result .= $months;
            }
            if( $days > 0 ){
                $result .= $days;
            }
            if( $hours > 0 ){
                $result .= $hours;
            }
            if( $minutes > 0 ){
                $result .= $minutes;
            }

            return $result;
        }
        return '';
    }
}

function get_silder(){
    $images = array_diff(scandir(public_path("common/slides", 1)), array('..', '.'));
    $path = asset('public/common/slides').'/';
    $html = '';
    if(!empty($images)){
        foreach ($images as $image) {
        $html .= '<li class="text-left">'.
                '<img src="' . $path . $image . '" alt="'.$image.'">'.
                '<div class="container">'.
                    '<div class="row">'.
                        '<div class="col-md-12">'.
                            '<h1 class="m-b-20"><strong>'. trans("page.welcome_xanhtuoi_copany") .'</strong></h1>'.
                            '<p><a class="btn hvr-hover click-go" href="javascript:void(0);">'. trans("page.aquarium_xanhtuoi") .'</a></p>'.
                        '</div>'.
                    '</div>'.
                '</div>'.
            '</li>';
        }
    }
    return  $html;
}

function activeMenu($uri = '') {
    $active = '';
    if (Request::is(Request::segment(1) . '/' . $uri . '/*') || Request::is(Request::segment(1) . '/' . $uri) || Request::is($uri)) {
        $active = 'active';
    }
    return $active;
}

if (!function_exists('getInfoByIP')) {

	function getInfoByIP($ip)
	{
		$apiKey = IP_API_KEY;
	    $location = get_geolocation($apiKey, $ip);
	    return json_decode($location, true);
	}
}

if (!function_exists('count_contact_new')) {

	function count_contact_new()
	{
		return ContactModel::getCountUnread();
	}
}


if (!function_exists('slider_pro')) {

    function slider_pro()
    {
        return ProductModel::getfSlider($cat_id=false);
    }
}

if (!function_exists('get_gallery')) {

    function get_gallery()
    {
        return ProductModel::getfAllGallery();
    }
}

function get_geolocation($apiKey, $ip, $lang = "en", $fields = "*", $excludes = "") {
    $url = "https://api.ipgeolocation.io/ipgeo?apiKey=".$apiKey."&ip=".$ip."&lang=".$lang."&fields=".$fields."&excludes=".$excludes;
    $cURL = curl_init();

    curl_setopt($cURL, CURLOPT_URL, $url);
    curl_setopt($cURL, CURLOPT_HTTPGET, true);
    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json'
    ));
    return curl_exec($cURL);
}

function limitTextWords($content = false, $limit = false, $stripTags = false, $ellipsis = false) 
{
	$title = 'title="'.$content.'"';
    if ($content && $limit) {
        $content = ($stripTags ? strip_tags($content) : $content);
        $content = explode(' ', $content, $limit+1);
        array_pop($content);
        if ($ellipsis) {
            array_push($content, ' <a href="#" '.$title.'>...</a>');
        }
        $content = implode(' ', $content);
    }
    return $content;
}

function split_words($string, $limit, $separator){
    $title = 'title="'.$string.'"';
    $string = strip_tags(html_entity_decode($string));
    if( strlen($string) <= $limit ){
        $final_string = $string;
    } else {
        $final_string = "";
        $words = explode(" ", $string, $limit+1);
        foreach( $words as $value ){
            if( strlen($final_string . " " . $value) < $limit ){
                if( !empty($final_string) ) $final_string .= " ";
                $final_string .= $value;
            } else {
                break;
            }
        }
       // $final_string .= ' <a data-c-tooltip="'.$string.'" href="#" >'. $separator . '</a>';
        $final_string .= ' <a href="javascript:void(0);" class="tooltip-multiline tooltip-top-left" data-tooltip="'.$string.'">...</a>';
    }
    return $final_string;
}

function count_prod($cat, $arrPro=array()){
    if(!empty($arrPro)){
        foreach ($arrPro as $key => $prod) {
            if($prod->cat_id != $cat) unset($arrPro->$key);
        }
        return count($arrPro);
    }else{
        return 0;
    }
}

function rename_appending_unique_id($source, $tempfile){
    $target_path ='uploads-unique-id/'.$source;
     while(file_exists($target_path)){
        $fileName = uniqid().'-'.$source;
        $target_path = ('uploads-unique-id/'.$fileName);
    }
    move_uploaded_file($tempfile, $target_path);
}

if(isset($_FILES['upload']['name'])){
    $sourcefile= $_FILES['upload']['name'];
    $tempfile= $_FILES['upload']['tmp_name'];
    rename_appending_unique_id($sourcefile, $tempfile);
}