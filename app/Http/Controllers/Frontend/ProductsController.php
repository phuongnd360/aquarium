<?php namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Models\ProductModel;
use App\Http\Models\CategoryModel;
use Illuminate\Http\Request;
use Session;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class ProductsController extends FrontendController
{
    use SEOToolsTrait;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){        
        $clsCategory = new CategoryModel();
        $categories = $clsCategory->getfCatCoutPro();

        $clsProduct = new ProductModel();
        $products = $clsProduct->frontAllPro(false);
        if ($request->session()->has('contact')) {
            $request->session()->forget('contact');
        }

        $this->seo()->setTitle('XANH TUOI TROPICAL FISH CO.,LTD - XANH TUOI AQUARIUM');
        $this->seo()->setDescription('XANH TUOI TROPICAL FISH CO.,LTD is a leading exporter of tropical ornamental fish, marine fish, fresh water fish &amp; marine invertebrates, clams, corals in Vietnam. We export a wide variety of live tropical ornamental fish, clams, corals to our customers in more than 40 countries world wide');
        $this->seo()->opengraph()->setUrl('https://xanhtuoitropicalfish.com');
        $this->seo()->opengraph()->addProperty('type', 'Xanh Tuoi Aquarium');
        $this->seo()->twitter()->setSite('@xanhtuoi');
        $this->seo()->jsonLd()->setType('Xanh Tuoi Aquarium');

        return view('frontend.products.index',compact('categories','products'));
    }

    public function detail($cat_id, $id){
        $clsProduct = new ProductModel();
        $products = $clsProduct->frontAllPro(false);
        $product = $clsProduct->getfById($id);
        $prts = $clsProduct->getfProByCat($cat_id);

        if(empty($product) || $product == NULL) return redirect()->route('frontend.errors.404');
        if(!empty($product)){
            $this->seo()->setTitle($product->seo_title .' '. trans('page.company_xanhtuoi'));
            $this->seo()->setDescription($product->seo_description);
            //$this->seo()->setKeywords($product->seo_keyword);
            $this->seo()->opengraph()->setUrl($product->seo_url);
            $this->seo()->opengraph()->addProperty('type', 'XanhTuoiAquarium');
            $this->seo()->twitter()->setSite('@xanhtuoi');
            $this->seo()->jsonLd()->setType('XanhTuoiAquarium');
        }
        return view('frontend.products.detail',compact('product','products', 'prts'));
    }

    
    

}
