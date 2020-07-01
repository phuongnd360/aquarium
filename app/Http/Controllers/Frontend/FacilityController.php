<?php namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Models\FacilityModel;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class FacilityController extends FrontendController
{
    use SEOToolsTrait;

    public function index()
    {
        $clsFacility   = new FacilityModel();
        $facilities     = $clsFacility->frontAllFacility();
        if(count($facilities) > 0){
            $facility = @$facilities[0];
            $this->seo()->setTitle($facility->seo_title .' - '. trans('page.company_xanhtuoi'));
            $this->seo()->setDescription($facility->seo_description);
            $this->seo()->opengraph()->setUrl($facility->seo_url);
            $this->seo()->opengraph()->addProperty('type', 'XanhTuoiAquarium');
            $this->seo()->twitter()->setSite('@xanhtuoi');
            $this->seo()->jsonLd()->setType('XanhTuoiAquarium');
        }
        return view('frontend.facilities.index', compact('facilities'));
    }
}
