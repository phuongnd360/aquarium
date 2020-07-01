<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use Session;
use Illuminate\Http\Request;
use App\Http\Models\VideoModel;
use Illuminate\Support\Facades\Auth;

class VideoController extends BackendController
{
    /**
     * Show videos list.
     */
    public function index()
    {
    	$clsVideo = new VideoModel();
		$videos = $clsVideo->getAllVideo();
        return view('backend.videos.index', compact('videos'));
    }

    /**
     * Show Video new create.
     */
    public function create()
    {
    	$clsVideo = new VideoModel();
    	$sort = $clsVideo->getMaxSort();
		return view('backend.videos.create', compact('sort'));
    }

    /**
     * Storage Video.
     */
    public function storage(Request $request)
    {
    	$clsVideo = new VideoModel();
        $data['type_video']               = $request->input('type_video');

        $path_original = '/uploads/videos/';

        if($request->input('type_video') == 1){
            if(!empty($request->input('embed_video'))){
                preg_match_all('/<iframe[^>]+src="([^"]+)"/', $request->input('embed_video'), $match);

                $data['url']            = @$match[1][0];
            }
            $data['embed_video']    = $request->input('embed_video');
        }else if($request->input('type_video') == 2){
            if ($request->hasFile('video_file')) {
                $video = $request->file('video_file');
                
                $originalVideo = $video->getClientOriginalName();
                $fileMoreName = $this->chkFileName(storage_path().$path_original, $originalVideo);
				
                move_uploaded_file($video->getPathName(), storage_path() . $path_original . $fileMoreName);
                //$data['embed_video']    = $fileMoreName;
                $data['url']            = $fileMoreName;
            }
            
        }        

    	$data['title_en']			= $request->input('title_en');
    	$data['title_vi']			= $request->input('title_vi');
    	if(!empty($request->input('sort'))){
    		$data['sort']			= $request->input('sort');
    	}else{
    		$data['sort']			= $clsVideo->getMaxSort();
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

		if($clsVideo->insert($data)){			
			Session::flash('success', trans('common.msg_admin_videos_create_success'));
			return redirect()->route('backend.videos.index');
		}else{
			Session::flash('danger', trans('common.msg_admin_videos_create_danger'));
			return redirect()->route('backend.videos.create');
		}

    }

    /**
     * Edit Video.
     */
    public function edit($id)
    {
    	$clsVideo = new VideoModel();
		$video = $clsVideo->getById($id);
		return view('backend.videos.edit', compact('video'));
    }

    /**
     * Update Video.
     */
    public function update($id, Request $request)
    {
    	$clsVideo = new VideoModel();
    	
    	$data['title_en']			= $request->input('title_en');
    	$data['title_vi']			= $request->input('title_vi');
        $data['type_video']         = $request->input('type_video');

        $path_original = '/uploads/videos/';

        if($request->input('type_video') == 1){
            if(!empty($request->input('embed_video'))){
                preg_match_all('/<iframe[^>]+src="([^"]+)"/', $request->input('embed_video'), $match);

                $data['url']            = @$match[1][0];
            }
            $data['embed_video']    = $request->input('embed_video');
        }else if($request->input('type_video') == 2){
            if ($request->hasFile('video_file')) {
                $video = $request->file('video_file');
                
                $originalVideo = $video->getClientOriginalName();
                $fileMoreName = $this->chkFileName(storage_path().$path_original, $originalVideo);

                move_uploaded_file($video->getPathName(), storage_path() . $path_original . $fileMoreName);
                //$data['embed_video']    = $fileMoreName;
                $data['url']            = $fileMoreName;
            }
            
        }

    	if(!empty($request->input('sort'))){
    		$data['sort']			= $request->input('sort');
    	}else{
    		$data['sort']			= $clsVideo->getMaxSort();
    	}
    	$data['seo_title']			= $request->input('seo_title');
    	$data['seo_url']			= $request->input('seo_url');
    	$data['seo_keyword']		= $request->input('seo_keyword');
    	$data['seo_description']	= $request->input('seo_description');
        $data['status']				= $request->input('status');
        $data['top_page']           = $request->input('top_page');
    	$data['is_delete'] 			= NULL;
		$data['last_ip'] 			= CLIENT_IP_ADRS;
		$data['last_user'] 			= Auth::id();
		$data['created_at'] 		= date('Y-m-d H:i:s');
		$data['updated_at'] 		= date('Y-m-d H:i:s');

		if($clsVideo->update($id, $data)){			
			Session::flash('success', trans('common.msg_admin_cat_edit_success'));
			return redirect()->route('backend.videos.index');
		}else{
			Session::flash('danger', trans('common.msg_admin_cat_edit_danger'));
			return redirect()->route('backend.videos.edit',$id);
		}
    }

    /**
     * Show Video.
     */
    public function show($id)
    {
    	$clsVideo = new VideoModel();
        $video = $clsVideo->getById($id);
		return view('backend.videos.show', compact('video'));
    }

    /**
     * Delete the Video.
     */
    public function delete($id)
    {
    	$clsVideo = new VideoModel();
		$video = $clsVideo->getById($id);
		return view('backend.videos.delete', compact('video'));
    }

    /**
     * Destroy the Video.
     */
    public function destroy($id, Request $request)
    {
    	$clsVideo = new VideoModel();
    	
    	$data['is_delete'] 			= DELETE;
		$data['last_ip'] 			= CLIENT_IP_ADRS;
		$data['last_user'] 			= Auth::id();
		$data['updated_at'] 		= date('Y-m-d H:i:s');

		if($clsVideo->update($id, $data)){
			Session::flash('success', trans('common.msg_admin_cat_delete_success'));
			return redirect()->route('backend.videos.index');
		}else{
			Session::flash('danger', trans('common.msg_admin_cat_delete_danger'));
			return redirect()->route('backend.videos.delete',$id);
		}
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
        $clsVideo   = new VideoModel();
        $id         = $request->input('id');
        $action     = $request->input('action');
        $sort       = $request->input('sort');
        $videos     = $clsVideo->getAllVideo();

        if($action == 'UP'){
            foreach ($videos as $kV => $valV) {
                if($valV->id == $id){
                    $prevV = $videos[$kV-1];
                    $prevID = $prevV->id;
                    $prevSort = $prevV->sort;
                    $clsVideo->update($prevID, ['sort'=>$sort, 'updated_at'=>date('Y-m-d H:i:s')]);
                    $clsVideo->update($id, ['sort'=>$prevSort, 'updated_at'=>date('Y-m-d H:i:s')]);
                    break;
                }
            }
        }

        if($action == 'DOWN'){
            foreach ($videos as $kV => $valV) {
                if($valV->id == $id){
                    $nextV = $videos[$kV+1];
                    $nextID = $nextV->id;
                    $nextSort = $nextV->sort;
                    $clsVideo->update($nextID, ['sort'=>$sort, 'updated_at'=>date('Y-m-d H:i:s')]);
                    $clsVideo->update($id, ['sort'=>$nextSort, 'updated_at'=>date('Y-m-d H:i:s')]);
                    break;
                }
            }
        }

        return response()->json(['result'=>'OK']);

    }
}
