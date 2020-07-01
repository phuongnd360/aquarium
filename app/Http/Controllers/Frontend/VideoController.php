<?php namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Models\VideoModel;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class VideoController extends FrontendController
{
    use SEOToolsTrait;
    public function index()
    {
        $clsVideo   = new VideoModel();
        $videos     = $clsVideo->frontAllVideo();

        if( !empty($videos) ){
            $video = @$videos[0];
            $this->seo()->setTitle($video->seo_title .' '. trans('page.company_xanhtuoi'));
            $this->seo()->setDescription($video->seo_description);
            $this->seo()->opengraph()->setUrl($video->seo_url);
            $this->seo()->opengraph()->addProperty('type', 'Xanh Tuoi Aquarium');
            $this->seo()->twitter()->setSite('@xanhtuoi');
            $this->seo()->jsonLd()->setType('Xanh Tuoi Aquarium');
        }
        return view('frontend.videos.index', compact('videos'));
    }
}
