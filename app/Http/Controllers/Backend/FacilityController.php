<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use Session;
use Illuminate\Http\Request;
use App\Http\Models\FacilityModel;
use Illuminate\Support\Facades\Auth;

class FacilityController extends BackendController
{
    /**
     * Show Facilitys list.
     */
    public function index(Request $request)
    {
        $clsFacility = new FacilityModel();
        $facilities = $clsFacility->getAllFacility();

        return view('backend.facilities.index', compact('facilities'));
    }

    /**
     * Show Facility new create.
     */
    public function create()
    {
    	$clsFacility = new FacilityModel();
    	$sort = $clsFacility->getMaxSort();
		return view('backend.facilities.create', compact('sort'));
    }

    /**
     * Storage Facility.
     */
    public function storage(Request $request)
    {
    	$clsFacility = new FacilityModel();
    	$data['title_en']			= $request->input('title_en');
    	$data['title_vi']			= $request->input('title_vi');
        $data['description_en']     = $request->input('description_en');
        $data['description_vi']     = $request->input('description_vi');
        $data['water_mark']         = $request->input('water_mark');

        $path_original = '/uploads/facilities/original/';
        $path_thumbs = '/uploads/facilities/thumbs/';

        if ($request->hasFile('image_primary')) {
            $primaryImg = $request->file('image_primary');
            $originalImg = $primaryImg->getClientOriginalName();
            $fileName = $this->chkFileName(storage_path().$path_original, $originalImg);
            move_uploaded_file($primaryImg->getPathName(), storage_path() . $path_original . $fileName);
            $this->correctImageOrientation(storage_path().$path_thumbs . $fileName);
            $this->cropImage(storage_path().$path_original . $fileName, storage_path().$path_thumbs . $fileName, $data['water_mark']);
            $data['image_primary'] = $fileName;
        }

    	if(!empty($request->input('sort'))){
    		$data['sort']			= $request->input('sort');
    	}else{
    		$data['sort']			= $clsFacility->getMaxSort();
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

		if($clsFacility->insert($data)){			
			Session::flash('success', trans('common.msg_admin_facility_create_success'));
			return redirect()->route('backend.facilities.index');
		}else{
			Session::flash('danger', trans('common.msg_admin_facility_create_danger'));
			return redirect()->route('backend.facilities.create');
		}

    }

    /**
     * Edit Facility.
     */
    public function edit($id)
    {
    	$clsFacility = new FacilityModel();
		$facility = $clsFacility->getById($id);
		return view('backend.facilities.edit', compact('facility'));
    }

    /**
     * Update Facility.
     */
    public function update($id, Request $request)
    {
    	$clsFacility = new FacilityModel();
    	
        $data['title_en']            = $request->input('title_en');
        $data['title_vi']            = $request->input('title_vi');
        $data['description_en']      = $request->input('description_en');
        $data['description_vi']      = $request->input('description_vi');
        $data['water_mark']          = $request->input('water_mark');
    	if(!empty($request->input('sort'))){
    		$data['sort']			= $request->input('sort');
    	}else{
    		$data['sort']			= $clsFacility->getMaxSort();
    	}

        $path_original = '/uploads/facilities/original/';
        $path_thumbs = '/uploads/facilities/thumbs/';

        if($request->input('radio_img_primary') == 2){
            if ($request->hasFile('image_primary')) {
                $primaryImg = $request->file('image_primary');
                $originalImg = $primaryImg->getClientOriginalName();
                $fileName = $this->chkFileName(storage_path().$path_original, $originalImg);
                move_uploaded_file($primaryImg->getPathName(), storage_path() . $path_original . $fileName);
                $this->correctImageOrientation(storage_path().$path_thumbs . $fileName);
                $this->cropImage(storage_path().$path_original . $fileName, storage_path().$path_thumbs . $fileName, $data['water_mark']);
                $data['image_primary'] = $fileName;
            }else{
                $data['image_primary'] = NULL;
            }
        }else if($request->input('radio_img_primary') == 3){
            $data['image_primary'] = NULL;
        }        

    	$data['seo_title']          = $request->input('seo_title');
        $data['seo_url']            = $request->input('seo_url');
        $data['seo_keyword']        = $request->input('seo_keyword');
        $data['seo_description']    = $request->input('seo_description');

        $data['status']             = $request->input('status');
        $data['is_delete']          = NULL;
        $data['last_ip']            = CLIENT_IP_ADRS;
        $data['last_user']          = Auth::id();
        $data['updated_at']         = date('Y-m-d H:i:s');

		if($clsFacility->update($id, $data)){			
			Session::flash('success', trans('common.msg_admin_facility_edit_success'));
			return redirect()->route('backend.facilities.index');
		}else{
			Session::flash('danger', trans('common.msg_admin_facility_edit_danger'));
			return redirect()->route('backend.facilities.edit',$id);
		}
    }


    /**
     * Show Facility.
     */
    public function show($id)
    {
    	$clsFacility = new FacilityModel();
		$facility = $clsFacility->getById($id);
		return view('backend.facilities.show', compact('facility'));
    }

    /**
     * Delete the Facility.
     */
    public function delete($id)
    {
    	$clsFacility = new FacilityModel();
		$facility = $clsFacility->getById($id);
		return view('backend.facilities.delete', compact('facility'));
    }

    /**
     * Destroy the Facility.
     */
    public function destroy($id, Request $request)
    {
    	$clsFacility = new FacilityModel();
    	
    	$data['is_delete'] 			= DELETE;
		$data['last_ip'] 			= CLIENT_IP_ADRS;
		$data['last_user'] 			= Auth::id();
		$data['updated_at'] 		= date('Y-m-d H:i:s');

		if($clsFacility->update($id, $data)){
			Session::flash('success', trans('common.msg_admin_facility_delete_success'));
			return redirect()->route('backend.facilities.index');
		}else{
			Session::flash('danger', trans('common.msg_admin_facility_delete_danger'));
			return redirect()->route('backend.facilities.delete',$id);
		}
    }

    function cropImage($filename, $newNamePath, $text=''){
        $width  = getimagesize($filename)[0];
        $height = getimagesize($filename)[1];
        $centreX = round($width / 2);
        $centreY = round($height / 2);

        if($width > $height){
            $cropWidth = $height;
            $cropHeight = $height;
        }elseif($height > $width){
            $cropHeight = $width;
            $cropWidth = $width;
        }else{
            $cropWidth = $width;
            $cropHeight = $height;
        }       
        
        $cropWidthHalf  = round($cropWidth / 2);
        $cropHeightHalf = round($cropHeight / 2);

        $x1 = max(0, $centreX - $cropWidthHalf);
        $y1 = max(0, $centreY - $cropHeightHalf);

        $src = @imagecreatefromstring(file_get_contents($filename));
        $fontsize = 20;

        // Replace path by your own font path
        $font = public_path('Arial.ttf');
        $tb = imagettfbbox($fontsize, 0, $font, $text);

        if($cropWidthHalf <= $tb[2]/2){
            $tmp = ($tb[2]/2) - $cropWidthHalf;
            $fontsize = ($fontsize - ceil(sqrt($tmp)) + 1);
            $tbb = imagettfbbox($fontsize, 0, $font, $text);
            $x = ceil($cropWidthHalf - ($tbb[2]/2));
        }else{
            $x = ceil($cropWidthHalf - ($tb[2]/2));
        }

        if($cropWidth != null && $cropHeight != null){
            $dest = imagecreatetruecolor($cropWidth, $cropHeight);
            $white = imagecolorallocate($dest, 128, 128, 128);            
            imagecopy($dest,$src,0,0,$x1,$y1,$width,$height);
            // Print Text On Image
            imagettftext($dest, $fontsize, 0, $x, $cropHeightHalf, $white, $font, $text);
            imagejpeg($dest,$newNamePath,90);
            imagedestroy($dest);
            imagedestroy($src);
        }
    }

    function correctImageOrientation($filename) {
      if (function_exists('exif_read_data')) {
        $exif = @exif_read_data($filename, 0 , true);
        if($exif && isset($exif['IFD0']['Orientation'])) {
          $orientation = $exif['IFD0']['Orientation'];
          if($orientation != 1){
            //$img = imagecreatefromjpeg($filename);
            $img = @imagecreatefromstring(file_get_contents($filename));
            $deg = 0;
            switch ($orientation) {
              case 3:
                $deg = 180;
                break;
              case 6:
                $deg = 270;
                break;
              case 8:
                $deg = 90;
                break;
            }
            if ($deg) {
              $img = imagerotate($img, $deg, 0);        
            }
            // then rewrite the rotated image back to the disk as $filename 
           imagejpeg($img, $filename, 90);
          } // if there is some rotation necessary
        } // if have the exif orientation info
      } // if function exists      
    }


    function chkFileName($path, $filename) {
        $res = "$path/$filename";
        if (!file_exists($res)) return $filename;
        $fnameNoExt = pathinfo($filename,PATHINFO_FILENAME);
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        $i = 1;
        while(file_exists("$path/$fnameNoExt ($i).$ext")) $i++;
        return "$fnameNoExt($i).$ext";
    }

    public function sort_ajax(Request $request){
        $clsFacility = new FacilityModel();
        $facilities = $clsFacility->getAllFacility();

        $id         = $request->input('id');
        $action     = $request->input('action');
        $sort       = $request->input('sort');
        
        $last_key   = $facilities->keys()->last();
        $last_item  = $facilities[$last_key];
        $last_id    = $last_item->id;
        
        $first_item  = $facilities[0];
        $first_id   = $first_item->id;

        //$total = count($facilities);

        if($action == 'UP'){
            if($id == $first_id) return response()->json(['result'=>'STOP']);
            foreach ($facilities as $kF => $valF) {
                if($valF->id == $id){
                    $prevF = $facilities[$kF-1];
                    $prevID = $prevF->id;
                    $prevSort = $prevF->sort;
                    $clsFacility->update($prevID, ['sort'=>$sort, 'updated_at'=>date('Y-m-d H:i:s')]);
                    $clsFacility->update($id, ['sort'=>$prevSort, 'updated_at'=>date('Y-m-d H:i:s')]);
                    break;
                }
            }
        }

        if($action == 'DOWN'){
            if($id == $last_id) return response()->json(['result'=>'STOP']);
            foreach ($facilities as $kF => $valF) {
                if($valF->id == $id){
                    $nextF = $facilities[$kF+1];
                    $nextID = $nextF->id;
                    $nextSort = $nextF->sort;
                    $clsFacility->update($nextID, ['sort'=>$sort, 'updated_at'=>date('Y-m-d H:i:s')]);
                    $clsFacility->update($id, ['sort'=>$nextSort, 'updated_at'=>date('Y-m-d H:i:s')]);
                    break;
                }
            }
        }

        return response()->json(['result'=>'OK']);

    }

}
