<?php namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Models\ProductModel;
use Illuminate\Http\Request;
use App\Http\Models\CategoryModel;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR
//use Artesaos\SEOTools\Facades\SEOTools;


class SearchController extends FrontendController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $page = $request->input('page') ? $request->input('page') : 1;
        $keyword = trim($request->input('keyword'));
        $clsProduct   = new ProductModel();
        $products     = $clsProduct->search($keyword);
        $clsCategory = new CategoryModel();
        $categories = $clsCategory->getfCatCoutPro();
        return view('frontend.search.index', compact('products','categories','keyword','page'));
    }
}
