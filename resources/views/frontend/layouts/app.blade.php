<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Site Metas -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! app('seotools')->generate() !!}
    
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous"> -->

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('public/common/images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('public/common/images/apple-touch-icon.png') }}">    
        <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('public/common/Font-Awesome-5.6.1/css/all.css?v='.filemtime('public/common/Font-Awesome-5.6.1/css/all.css')) }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/common/css/bootstrap.min.css?v='.filemtime('public/common/css/bootstrap.min.css')) }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('public/common/css/style.css?v='.filemtime('public/common/css/style.css')) }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('public/common/css/responsive.css?v='.filemtime('public/common/css/responsive.css')) }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('public/common/css/custom.css?v='.filemtime('public/common/css/custom.css')) }}">
    <link rel="stylesheet" href="{{ asset('public/common/css/paginate.css?v='.filemtime('public/common/css/paginate.css')) }}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        
    <link rel="stylesheet" href="{{ asset('public/common/lightbox/css/lc_lightbox.css?v='.filemtime('public/common/lightbox/css/lc_lightbox.css')) }}">

    <link rel="stylesheet" href="{{ asset('public/common/language/css/flags.css?v='.filemtime('public/common/language/css/flags.css')) }}">

    <script src="{{ asset('public/common/js/jquery-1.12.4.min.js') }}"></script>
    
    <script src="{{ asset('public/common/js/jquery.vide.js') }}"></script>

</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid bg-container">
            <div class="header-top row">
                <div class="container-top">
                    <div class="block-inline">                    
                            <p>
                                <span class="block-inline-left">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d245.0047226750079!2d106.63407188115316!3d10.728655340161232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752e74955d886f%3A0x292ed1df2158ef2c!2zMTIxLCA0IEjhurttIFPhu5EgNSBN4buFIEPhu5FjLCBwaMaw4budbmcgMTUsIFF14bqtbiA4LCBI4buTIENow60gTWluaCwgVmlldG5hbQ!5e0!3m2!1sen!2sus!4v1577349657508!5m2!1sen!2sus" target="_blank"> {{trans('page.hcm_vn')}}</a>
                                </span>
                                <span class="block-inline-right"><i class="fas fa-phone-square"></i> Hotline : <a href="tel:84913681086"><strong>(+84) 909 810 346</strong></a> / <a href="tel:84938505397"><strong>(+84) 938 505 397</strong></a></span>
                                <span class="block-inline-right"><i class="fas fa-envelope"></i> Email: <a href="mailto:tuoi@xanhtuoitropicalfish.com"><strong>tuoi@xanhtuoitropicalfish.com</strong></a></span>
                            </p>
                            
                    </div>
                    <div class="block-right">
                    <?php if(app()->getLocale() == 'en') $locale = 'GB'; else  $locale = 'VN'; ?>                       
                        <div id="options" data-selected-country="{{$locale}}"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->
    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav nav-logo">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand navbar-custom" href="{{route('frontend.home.index')}}"><img src="{{ asset('public/common') }}/images/logo-xt.png" class="logo" alt="" width="130" height="100"></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item {{ activeMenu('')}}"><a class="nav-link" href="{{route('frontend.home.index')}}">{{trans('page.menu_home')}}</a></li>
                        <li class="nav-item {{ activeMenu('about')}}"><a class="nav-link" href="{{route('frontend.about.index')}}">{{trans('page.menu_about')}}</a></li>
                        <li class="nav-item {{ activeMenu('products')}} {{ activeMenu('detail')}}"><a class="nav-link" href="{{route('frontend.products.index')}}">{{trans('page.menu_product')}}</a></li>
                        <li class="nav-item {{ activeMenu('videos')}} {{ activeMenu('video')}}"><a class="nav-link" href="{{route('frontend.videos.index')}}">{{trans('page.menu_video')}}</a></li>
                        <li class="nav-item {{ activeMenu('facility')}}"><a class="nav-link" href="{{route('frontend.facility.index')}}">{{trans('page.menu_facility')}}</a></li>
                        <li class="nav-item {{ activeMenu('contact')}} {{ activeMenu('confirm')}} {{ activeMenu('sent')}}"><a class="nav-link" href="{{route('frontend.contacts.index')}}">{{trans('page.menu_contact')}}</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="javascript:void(0);"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->
    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <form action="{{route('frontend.search.index')}}" method="get" enctype="multipart/form-data">
               <!--  @csrf -->
                <div class="input-group">
                    <input class="form-control" name="keyword" placeholder="{{trans('page.placeholer_search')}}" value="{{@$keyword}}" type="text">
                    <button type="submit" class="btn-search"> <i class="fa fa-search"></i> </button>
                </div>
            </form>

        </div>
    </div>
    <!-- End Top Search -->
    <!-- Content -->
    @yield('content')
    <!-- /Content -->    
    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>TAGS</h4>
                            <ul>
                                <li>
                                    @foreach(tags() as $tag)
                                        <label class="tags" for="{{ $tag['name'] }}">
                                            <a href="{{ $tag['url'] }}"> {{ $tag['name'] }} </label></a>
                                    @endforeach                                    
                                </li>
                            </ul>
                        </div>
                        <div class="footer-widget"style="margin-top:50px;">
                            <ul>
                                <li><a href="https://www.facebook.com/xanhtuoitopicalfish/" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://twitter.com/xanhtuoitrop" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.instagram.com/explore/locations/1660461597539903/xanh-tuoi-aquarium-vn/?hl=vi" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCDrOCsRqRCkIyfjj6K4A9qQ" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>{{trans('page.header_about_company')}}</h4>
                            <p>{{trans('page.about_company_info')}}</p>
                            <ul>
                                <li><a href="https://www.facebook.com/xanhtuoitopicalfish/" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://twitter.com/xanhtuoitrop" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.instagram.com/explore/locations/1660461597539903/xanh-tuoi-aquarium-vn/?hl=vi" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCDrOCsRqRCkIyfjj6K4A9qQ" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div> --}}
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>{{trans('page.header_info')}}</h4>
                            <ul>
                                <li><a class="menu-footer" href="{{route('frontend.home.index')}}">{{trans('page.menu_home')}}</a></li>
                                <li><a class="menu-footer" href="{{route('frontend.about.index')}}">{{trans('page.menu_about')}}</a></li>
                                <li><a class="menu-footer" href="{{route('frontend.products.index')}}">{{trans('page.menu_product')}}</a></li>
                                <li><a class="menu-footer" href="{{route('frontend.videos.index')}}">{{trans('page.menu_video')}}</a></li>
                                <li><a class="menu-footer" href="{{route('frontend.facility.index')}}">{{trans('page.menu_facility')}}</a></li>
                                <li><a class="menu-footer" href="{{route('frontend.contacts.index')}}">{{trans('page.menu_contact')}}</a></li>
                                <li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>{{trans('page.menu_contact')}}</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i><strong>{{trans('page.lbl_address')}} </strong>: {{trans('page.txt_address1')}}</p>
                                    <p><i class="fas fa-map-marker-alt"></i><strong>{{trans('page.lbl_address1')}} </strong>: {{trans('page.txt_address2')}}</p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i><strong>{{trans('page.lbl_phone')}} </strong>: <a href="tel:842836201608">(+84) 283 620 1608</a></p>
                                    <p><i class="fas fa-fax"></i><strong>Fax </strong>: <a href="tel:842836201609">(+84) 283 620 1609</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i><strong>Email </strong>: <a href="mailto:tuoi@xanhtuoitropicalfish.com">tuoi@xanhtuoitropicalfish.com</a></p>
                                </li>
                                <li>
                                    <p><i class="fab fa-whatsapp" style="font-size:26px;"></i> <a href="https://api.whatsapp.com/send?phone=+84913681086"> WhatsApp</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        {!! trans('page.txt_footer') !!}
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <?php /*  <script src="{{ asset('public/common/js/jquery-ui.js') }}"></script> */ ?>
    
    <script src="{{ asset('public/common/js') }}/imagezoom.js"></script>
    <script src="{{ asset('public/common/language/js/jquery.flagstrap.js') }}"></script>
    <script>
        $(document).ready(function(){
            
        });
    </script>
    <script>
        $('#options').flagStrap({
            countries: {
                "GB": "English",
                "VN": "Tiếng Việt"
            },
            placeholder: false,
            buttonSize: "btn-sm",
            buttonType: "btn-primary",
            labelMargin: "10px",
            scrollable: false,
            scrollableHeight: "350px",
            onSelect: function (value, element) {
                var params = "{{$_SERVER['QUERY_STRING']}}";            
                if(value == 'VN'){
                    if(params != ''){
                        window.location.href = "{!! route('frontend.lang.setlang', 'vi') !!}"+'?'+params;
                    }else{
                        window.location.href = "{!! route('frontend.lang.setlang', 'vi') !!}";
                    }
                }else{
                    if(params != ''){
                        window.location.href = "{!! route('frontend.lang.setlang', 'en') !!}"+'?'+params;
                    }else{
                        window.location.href = "{!! route('frontend.lang.setlang', 'en') !!}";
                    }
                }
            }
        });
    </script>
    <script src="{{ asset('public/common/Font-Awesome-5.6.1/js/all.js?v='.filemtime('public/common/Font-Awesome-5.6.1/js/all.js')) }}"></script>

    <!-- ALL JS FILES -->
    <script src="{{ asset('public/common/js/popper.min.js?v='.filemtime('public/common/js/popper.min.js')) }}"></script>
    <script src="{{ asset('public/common/js/bootstrap.min.js?v='.filemtime('public/common/js/bootstrap.min.js')) }}"></script>

    <script src="{{ asset('public/common/lightbox/js/lc_lightbox.lite.js?v='.filemtime('public/common/lightbox/js/lc_lightbox.lite.js')) }}"></script>
    <script src="{{ asset('public/common/lightbox/lib/AlloyFinger/alloy_finger.min.js?v='.filemtime('public/common/lightbox/lib/AlloyFinger/alloy_finger.min.js')) }}"></script>
    <script src="{{ asset('public/common/lightbox/lib/AlloyFinger/alloy_finger.min.js?v='.filemtime('public/common/lightbox/lib/AlloyFinger/alloy_finger.min.js')) }}"></script>

    
    <!-- ALL PLUGINS -->
    <script src="{{ asset('public/common/js/jquery.superslides.min.js?v='.filemtime('public/common/js/jquery.superslides.min.js')) }}"></script>
    <script src="{{ asset('public/common/js/bootstrap-select.js?v='.filemtime('public/common/js/bootstrap-select.js')) }}"></script>
    <script src="{{ asset('public/common/js/inewsticker.js?v='.filemtime('public/common/js/inewsticker.js')) }}"></script>
    <script src="{{ asset('public/common/js/bootsnav.js?v='.filemtime('public/common/js/bootsnav.js')) }}"></script>
    <script src="{{ asset('public/common/js/images-loded.min.js?v='.filemtime('public/common/js/images-loded.min.js')) }}"></script>
    <script src="{{ asset('public/common/js/isotope.min.js?v='.filemtime('public/common/js/isotope.min.js')) }}"></script>
    <script src="{{ asset('public/common/js/owl.carousel.min.js?v='.filemtime('public/common/js/owl.carousel.min.js')) }}"></script>
    <script src="{{ asset('public/common/js/baguetteBox.min.js?v='.filemtime('public/common/js/baguetteBox.min.js')) }}"></script>

    <script src="{{ asset('public/common/js/custom.js?v='.filemtime('public/common/js/custom.js')) }}"></script>

    <script type="text/javascript">
    $(".click-go").click(function() {
        $('html, body').animate({
            scrollTop: $("#div-gallery").offset().top - 199
        }, 600);
        return false;
    });
    </script>
    <!-- ALL JS FILES -->
</body>
</html>
