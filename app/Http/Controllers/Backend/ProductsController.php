<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use Session;
use Illuminate\Http\Request;
use App\Http\Models\ProductModel;
use App\Http\Models\CategoryModel;
use Illuminate\Support\Facades\Auth;

class ProductsController extends BackendController
{
    /**
     * Show products list.
     */
    public function index(Request $request)
    {
    	$clsCategory = new CategoryModel();
		$categories = $clsCategory->getListCat();
        $cat = $request->input('cat');
        $clsProduct = new ProductModel();
        $products = $clsProduct->getAllPro($cat);

        return view('backend.products.index', compact('categories','cat','products'));
    }

    /**
     * Show Product new create.
     */
    public function create()
    {
        $clsCategory = new CategoryModel();
        $categories = $clsCategory->getListCat();
    	$clsProduct = new ProductModel();
    	$sort = $clsProduct->getMaxSort();
		return view('backend.products.create', compact('sort','categories'));
    }

    /**
     * Storage Product.
     */
    public function storage(Request $request)
    {
    	$clsProduct = new ProductModel();
        $data['cat_id']             = $request->input('cat_id');
    	$data['name_en']			= $request->input('name_en');
    	$data['name_vi']			= $request->input('name_vi');
        $data['name_science']       = $request->input('name_science');
        $data['description_en']     = $request->input('description_en');
        $data['description_vi']     = $request->input('description_vi');
        $data['size']               = $request->input('size');
        $data['gallery']            = $request->input('gallery');
        $data['water_mark']         = $request->input('water_mark');

        $water_mark                 = $request->input('water_mark');
        $path_original = '/uploads/products/original/';
        $path_thumbs = '/uploads/products/thumbs/';
        $moreImgData = array();
       
        if ($request->hasFile('image_primary')) {
            $primaryImg = $request->file('image_primary');
            $originalImg = $primaryImg->getClientOriginalName();
            $fileName = $this->chkFileName(storage_path().$path_original, $originalImg);

            move_uploaded_file($primaryImg->getPathName(), storage_path() . $path_original . $fileName);
            $this->correctImageOrientation(storage_path().$path_thumbs . $fileName);
            $this->cropImage(storage_path().$path_original . $fileName, storage_path().$path_thumbs . $fileName, $water_mark);
            $data['image_primary'] = $fileName;
        }

        if ($request->hasFile('image_more')) {
            $moreImgArr = $request->file('image_more');
            foreach ($moreImgArr as $key => $moreImg) {
                $originalMoreImg = $moreImg->getClientOriginalName();
                $fileMoreName = $this->chkFileName(storage_path().$path_original, $originalMoreImg);

                move_uploaded_file($moreImg->getPathName(), storage_path() . $path_original . $fileMoreName);
                $this->correctImageOrientation(storage_path().$path_thumbs . $fileMoreName);
                $this->cropImage(storage_path().$path_original . $fileMoreName, storage_path().$path_thumbs . $fileMoreName, $water_mark);
                $moreImgData[]  = $fileMoreName;
            }
        }

        if(!empty($moreImgData)){
            $data['image_more'] = json_encode($moreImgData);
        }

    	if(!empty($request->input('sort'))){
    		$data['sort']			= $request->input('sort');
    	}else{
    		$data['sort']			= $clsProduct->getMaxSort();
    	}
    	
        $data['seo_title']			= $request->input('seo_title');
    	$data['seo_url']			= $request->input('seo_url');
    	$data['seo_keyword']		= $request->input('seo_keyword');
    	$data['seo_description']	= $request->input('seo_description');

        $data['top_page']           = $request->input('top_page');
    	$data['status']				= $request->input('status');
    	$data['is_delete'] 			= NULL;
		$data['last_ip'] 			= CLIENT_IP_ADRS;
		$data['last_user'] 			= Auth::id();
		$data['created_at'] 		= date('Y-m-d H:i:s');
		$data['updated_at'] 		= date('Y-m-d H:i:s');

		if($clsProduct->insert($data)){			
			Session::flash('success', trans('common.msg_admin_product_create_success'));
			return redirect()->route('backend.products.index');
		}else{
			Session::flash('danger', trans('common.msg_admin_product_create_danger'));
			return redirect()->route('backend.products.create');
		}

    }

    /**
     * Edit Product.
     */
    public function edit($id)
    {
        $clsCategory = new CategoryModel();
        $categories = $clsCategory->getListCat();
    	$clsProduct = new ProductModel();
		$product = $clsProduct->getById($id);
		return view('backend.products.edit', compact('product','categories'));
    }

    /**
     * Update Product.
     */
    public function update($id, Request $request)
    {
    	$clsProduct = new ProductModel();
    	
        $data['cat_id']             = $request->input('cat_id');
        $data['name_en']            = $request->input('name_en');
        $data['name_vi']            = $request->input('name_vi');
        $data['name_science']       = $request->input('name_science');
        $data['description_en']     = $request->input('description_en');
        $data['description_vi']     = $request->input('description_vi');
        $data['size']               = $request->input('size');
        $data['gallery']            = $request->input('gallery');
        $data['water_mark']         = $request->input('water_mark');
        $water_mark                 = $request->input('water_mark');

    	if(!empty($request->input('sort'))){
    		$data['sort']			= $request->input('sort');
    	}else{
    		$data['sort']			= $clsProduct->getMaxSort();
    	}

        $path_original = '/uploads/products/original/';
        $path_thumbs = '/uploads/products/thumbs/';
        $moreImgData = array();

        if($request->input('radio_img_primary') == 2){
            if ($request->hasFile('image_primary')) {
                $primaryImg = $request->file('image_primary');
                $originalImg = $primaryImg->getClientOriginalName();
                $fileName = $this->chkFileName(storage_path().$path_original, $originalImg);
                move_uploaded_file($primaryImg->getPathName(), storage_path() . $path_original . $fileName);
                $this->correctImageOrientation(storage_path().$path_thumbs . $fileName);
                $this->cropImage(storage_path().$path_original . $fileName, storage_path().$path_thumbs . $fileName, $water_mark);
                $data['image_primary'] = $fileName;
            }else{
                $data['image_primary'] = NULL;
            }
        }else if($request->input('radio_img_primary') == 3){
            $data['image_primary'] = NULL;
        }

        if($request->input('radio_img_more') == 2){
            if ($request->hasFile('image_more')) {
                $moreImgArr = $request->file('image_more');
                foreach ($moreImgArr as $key => $moreImg) {
                    $originalMoreImg = $moreImg->getClientOriginalName();
                    $fileMoreName = $this->chkFileName(storage_path().$path_original, $originalMoreImg);

                    move_uploaded_file($moreImg->getPathName(), storage_path() . $path_original . $fileMoreName);
                    $this->correctImageOrientation(storage_path().$path_thumbs . $fileMoreName);
                    $this->cropImage(storage_path().$path_original . $fileMoreName, storage_path().$path_thumbs . $fileMoreName, $water_mark);
                    $moreImgData[]  = $fileMoreName;
                }
            }else{
                $moreImgData[]  = array();
            }
            
            $data['image_more'] = json_encode($moreImgData);
            
        }else if($request->input('radio_img_more') == 3){
            $data['image_more'] = NULL;
        }

    	$data['seo_title']          = $request->input('seo_title');
        $data['seo_url']            = $request->input('seo_url');
        $data['seo_keyword']        = $request->input('seo_keyword');
        $data['seo_description']    = $request->input('seo_description');

        $data['top_page']           = $request->input('top_page');
        $data['status']             = $request->input('status');
        $data['is_delete']          = NULL;
        $data['last_ip']            = CLIENT_IP_ADRS;
        $data['last_user']          = Auth::id();
        $data['updated_at']         = date('Y-m-d H:i:s');

		if($clsProduct->update($id, $data)){			
			Session::flash('success', trans('common.msg_admin_product_edit_success'));
			return redirect()->route('backend.products.index');
		}else{
			Session::flash('danger', trans('common.msg_admin_product_edit_danger'));
			return redirect()->route('backend.products.edit',$id);
		}
    }

        /**
     * Copy product new create.
     */
    public function copy($id)
    {
        $clsCategory = new CategoryModel();
        $categories = $clsCategory->getListCat();
        $clsProduct = new ProductModel();
        $sort = $clsProduct->getMaxSort();
        $product = $clsProduct->getById($id);
        return view('backend.products.copy', compact('product','sort','categories'));
    }

    /**
     * Save Copy Product.
     */
    public function postCopy($id, Request $request)
    {
        $clsProduct = new ProductModel();
        $data['cat_id']             = $request->input('cat_id');
        $data['name_en']            = $request->input('name_en');
        $data['name_vi']            = $request->input('name_vi');
        $data['name_science']       = $request->input('name_science');
        $data['description_en']     = $request->input('description_en');
        $data['description_vi']     = $request->input('description_vi');
        $data['size']               = $request->input('size');
        $data['gallery']            = $request->input('gallery');
        $data['water_mark']         = $request->input('water_mark');
        $water_mark                 = $request->input('water_mark');

        $path_original = '/uploads/products/original/';
        $path_thumbs = '/uploads/products/thumbs/';
        $moreImgData = array();

        if($request->input('radio_img_primary') == 2){
            if ($request->hasFile('image_primary')) {
                $primaryImg = $request->file('image_primary');
                $originalImg = $primaryImg->getClientOriginalName();
                $fileName = $this->chkFileName(storage_path().$path_original, $originalImg);
                move_uploaded_file($primaryImg->getPathName(), storage_path() . $path_original . $fileName);
                $this->correctImageOrientation(storage_path().$path_thumbs . $fileName);
                $this->cropImage(storage_path().$path_original . $fileName, storage_path().$path_thumbs . $fileName, $water_mark );
                $data['image_primary'] = $fileName;
            }else{
                $data['image_primary'] = NULL;
            }
        }else if($request->input('radio_img_primary') == 3){
            $data['image_primary'] = NULL;
        }else if($request->input('radio_img_primary') == 1){
            $data['image_primary'] = $request->input('old_image_primary');
        }

        if($request->input('radio_img_more') == 2){
            if ($request->hasFile('image_more')) {
                $moreImgArr = $request->file('image_more');
                foreach ($moreImgArr as $key => $moreImg) {
                    $originalMoreImg = $moreImg->getClientOriginalName();
                    $fileMoreName = $this->chkFileName(storage_path().$path_original, $originalMoreImg);

                    move_uploaded_file($moreImg->getPathName(), storage_path() . $path_original . $fileMoreName);
                    $this->correctImageOrientation(storage_path().$path_thumbs . $fileMoreName);
                    $this->cropImage(storage_path().$path_original . $fileMoreName, storage_path().$path_thumbs . $fileMoreName, $water_mark );
                    $moreImgData[]  = $fileMoreName;
                }
            }else{
                $moreImgData[]  = array();
            }
            
            $data['image_more'] = json_encode($moreImgData);
            
        }else if($request->input('radio_img_more') == 3){
            $data['image_more'] = NULL;
        }else if($request->input('radio_img_more') == 1){
            $data['image_more'] = $request->input('old_image_more');
        }

        if(!empty($request->input('sort'))){
            $data['sort']           = $request->input('sort');
        }else{
            $data['sort']           = $clsProduct->getMaxSort();
        }
        
        $data['seo_title']          = $request->input('seo_title');
        $data['seo_url']            = $request->input('seo_url');
        $data['seo_keyword']        = $request->input('seo_keyword');
        $data['seo_description']    = $request->input('seo_description');

        $data['top_page']           = $request->input('top_page');
        $data['status']             = $request->input('status');
        $data['is_delete']          = NULL;
        $data['last_ip']            = CLIENT_IP_ADRS;
        $data['last_user']          = Auth::id();
        $data['created_at']         = date('Y-m-d H:i:s');
        $data['updated_at']         = date('Y-m-d H:i:s');

        if($clsProduct->insert($data)){         
            Session::flash('success', trans('common.msg_admin_product_copy_success'));
            return redirect()->route('backend.products.index');
        }else{
            Session::flash('danger', trans('common.msg_admin_product_copy_danger'));
            return redirect()->route('backend.products.copy',$id);
        }

    }

    /**
     * Show Product.
     */
    public function show($id)
    {
    	$clsProduct = new ProductModel();
		$product = $clsProduct->getById($id);
		return view('backend.products.show', compact('product'));
    }

    /**
     * Delete the Product.
     */
    public function delete($id)
    {
    	$clsProduct = new ProductModel();
		$product = $clsProduct->getById($id);
		return view('backend.products.delete', compact('product'));
    }

    /**
     * Destroy the Product.
     */
    public function destroy($id, Request $request)
    {
    	$clsProduct = new ProductModel();
    	
    	$data['is_delete'] 			= DELETE;
		$data['last_ip'] 			= CLIENT_IP_ADRS;
		$data['last_user'] 			= Auth::id();
		$data['updated_at'] 		= date('Y-m-d H:i:s');

		if($clsProduct->update($id, $data)){
			Session::flash('success', trans('common.msg_admin_product_delete_success'));
			return redirect()->route('backend.products.index');
		}else{
			Session::flash('danger', trans('common.msg_admin_product_delete_danger'));
			return redirect()->route('backend.products.delete',$id);
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
        $clsProduct = new ProductModel();
        $id         = $request->input('id');
        $action     = $request->input('action');
        $sort       = $request->input('sort');
        $cat        = $request->input('cat');
        $products   = $clsProduct->getAllPro($cat);

        $last_key   = $products->keys()->last();
        $last_item  = $products[$last_key];
        $last_id    = $last_item->id;
        
        $first_item  = $products[0];
        $first_id   = $first_item->id;

        //$total = count($products);

        if($action == 'UP'){
            if($id == $first_id) return response()->json(['result'=>'STOP']);
            foreach ($products as $kF => $valF) {
                if($valF->id == $id){
                    $prevF = $products[$kF-1];
                    $prevID = $prevF->id;
                    $prevSort = $prevF->sort;
                    $clsProduct->update($prevID, ['sort'=>$sort, 'updated_at'=>date('Y-m-d H:i:s')]);
                    $clsProduct->update($id, ['sort'=>$prevSort, 'updated_at'=>date('Y-m-d H:i:s')]);
                    break;
                }
            }
        }

        if($action == 'DOWN'){
            if($id == $last_id) return response()->json(['result'=>'STOP']);
            foreach ($products as $kF => $valF) {
                if($valF->id == $id){
                    $nextF = $products[$kF+1];
                    $nextID = $nextF->id;
                    $nextSort = $nextF->sort;
                    $clsProduct->update($nextID, ['sort'=>$sort, 'updated_at'=>date('Y-m-d H:i:s')]);
                    $clsProduct->update($id, ['sort'=>$nextSort, 'updated_at'=>date('Y-m-d H:i:s')]);
                    break;
                }
            }
        }

        return response()->json(['result'=>'OK']);

    }

}
