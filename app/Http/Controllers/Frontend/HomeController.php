<?php namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Models\ProductModel;
use App\Http\Models\CategoryModel;
use App\Http\Models\VideoModel;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Carbon\Carbon;

class HomeController extends FrontendController
{
    use SEOToolsTrait;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        put_visitor();
        
        $this->seo()->setTitle('XANH TUOI TROPICAL FISH CO.,LTD - XANH TUOI AQUARIUM');
        $this->seo()->setDescription('XANH TUOI TROPICAL FISH CO.,LTD is a leading exporter of tropical ornamental fish, marine fish, fresh water fish &amp; marine invertebrates, clams, corals in Vietnam. We export a wide variety of live tropical ornamental fish, clams, corals to our customers in more than 40 countries world wide');
        $this->seo()->opengraph()->setUrl('https://xanhtuoitropicalfish.com');
        $this->seo()->opengraph()->addProperty('type', 'XanhTuoiAquarium');
        $this->seo()->twitter()->setSite('@xanhtuoi');
        $this->seo()->jsonLd()->setType('XanhTuoiAquarium');

    	$clsCategory  = new CategoryModel();
		$categories   = $clsCategory->frontAllCat();
        $clsProduct   = new ProductModel();
        $products     = $clsProduct->frontAllPro(true);

        $clsVideo     = new VideoModel();
        $videos       = $clsVideo->getfVideos();
        return view('frontend.home.index', compact('products','categories','videos'));
    }
}
