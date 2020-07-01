<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use Session;
use Illuminate\Http\Request;
use App\Http\Models\CategoryModel;
use Illuminate\Support\Facades\Auth;

class CategoryController extends BackendController
{
    /**
     * Show categories list.
     */
    public function index()
    {
    	$clsCategory = new CategoryModel();
		$categories = $clsCategory->getAllCat();
        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Show category new create.
     */
    public function create()
    {
    	$clsCategory = new CategoryModel();
    	$sort = $clsCategory->getMaxSort();
		return view('backend.categories.create', compact('sort'));
    }

    /**
     * Storage category.
     */
    public function storage(Request $request)
    {
    	$clsCategory = new CategoryModel();
    	$data['name_en']			= $request->input('name_en');
    	$data['name_vi']			= $request->input('name_vi');
    	if(!empty($request->input('sort'))){
    		$data['sort']			= $request->input('sort');
    	}else{
    		$data['sort']			= $clsCategory->getMaxSort();
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

		if($clsCategory->insert($data)){			
			Session::flash('success', trans('common.msg_admin_cat_create_success'));
			return redirect()->route('backend.categories.index');
		}else{
			Session::flash('danger', trans('common.msg_admin_cat_create_danger'));
			return redirect()->route('backend.categories.create');
		}

    }

    /**
     * Edit category.
     */
    public function edit($id)
    {
    	$clsCategory = new CategoryModel();
		$category = $clsCategory->getById($id);
		return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update category.
     */
    public function update($id, Request $request)
    {
    	$clsCategory = new CategoryModel();
    	
    	$data['name_en']			= $request->input('name_en');
    	$data['name_vi']			= $request->input('name_vi');
    	if(!empty($request->input('sort'))){
    		$data['sort']			= $request->input('sort');
    	}else{
    		$data['sort']			= $clsCategory->getMaxSort();
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

		if($clsCategory->update($id, $data)){			
			Session::flash('success', trans('common.msg_admin_cat_edit_success'));
			return redirect()->route('backend.categories.index');
		}else{
			Session::flash('danger', trans('common.msg_admin_cat_edit_danger'));
			return redirect()->route('backend.categories.edit',$id);
		}
    }

    /**
     * Show category.
     */
    public function show($id)
    {
    	$clsCategory = new CategoryModel();
		$category = $clsCategory->getById($id);
		return view('backend.categories.show', compact('category'));
    }

    /**
     * Delete the category.
     */
    public function delete($id)
    {
    	$clsCategory = new CategoryModel();
		$category = $clsCategory->getById($id);
		return view('backend.categories.delete', compact('category'));
    }

    /**
     * Destroy the category.
     */
    public function destroy($id, Request $request)
    {
    	$clsCategory = new CategoryModel();
    	
    	$data['is_delete'] 			= DELETE;
		$data['last_ip'] 			= CLIENT_IP_ADRS;
		$data['last_user'] 			= Auth::id();
		$data['updated_at'] 		= date('Y-m-d H:i:s');

		if($clsCategory->update($id, $data)){
			Session::flash('success', trans('common.msg_admin_cat_delete_success'));
			return redirect()->route('backend.categories.index');
		}else{
			Session::flash('danger', trans('common.msg_admin_cat_delete_danger'));
			return redirect()->route('backend.categories.delete',$id);
		}
    }

    public function sort_ajax(Request $request){
        $clsCategory = new CategoryModel();
        $categories = $clsCategory->getAllCat();

        $id         = $request->input('id');
        $action     = $request->input('action');
        $sort       = $request->input('sort');

        $last_key   = $categories->keys()->last();
        $last_item  = $categories[$last_key];
        $last_id    = $last_item->id;
        
        $first_item  = $categories[0];
        $first_id   = $first_item->id;

        if($action == 'UP'){
            if($id == $first_id) return response()->json(['result'=>'STOP']);
            foreach ($categories as $kF => $valF) {
                if($valF->id == $id){
                    $prevF = $categories[$kF-1];
                    $prevID = $prevF->id;
                    $prevSort = $prevF->sort;
                    $clsCategory->update($prevID, ['sort'=>$sort, 'updated_at'=>date('Y-m-d H:i:s')]);
                    $clsCategory->update($id, ['sort'=>$prevSort, 'updated_at'=>date('Y-m-d H:i:s')]);
                    break;
                }
            }
        }

        if($action == 'DOWN'){
            if($id == $last_id) return response()->json(['result'=>'STOP']);
            foreach ($categories as $kF => $valF) {
                if($valF->id == $id){
                    $nextF = $categories[$kF+1];
                    $nextID = $nextF->id;
                    $nextSort = $nextF->sort;
                    $clsCategory->update($nextID, ['sort'=>$sort, 'updated_at'=>date('Y-m-d H:i:s')]);
                    $clsCategory->update($id, ['sort'=>$nextSort, 'updated_at'=>date('Y-m-d H:i:s')]);
                    break;
                }
            }
        }

        return response()->json(['result'=>'OK']);

    }
}
