<?php namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Models\ProductModel;


use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR
//use Artesaos\SEOTools\Facades\SEOTools;


class AboutController extends FrontendController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clsProduct   = new ProductModel();
        $products     = $clsProduct->frontAllPro(true);

        return view('frontend.about.index', compact('products'));
    }
}
