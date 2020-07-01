@extends('frontend.layouts.app',['page'=>'product']) @section('content')
<!-- Start All Title Box -->

<div class="all-title-box breadcrumb-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>{{trans('page.breadcrumb_product')}}</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('frontend.home.index')}}">{{trans('page.breadcrumb_home')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('frontend.products.index')}}">{{trans('page.breadcrumb_product')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('page.breadcrumb_product_active')}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Product Detail  -->
    <div class="shop-detail-box-main">
        <div class="container prod-detail">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block w-100" id="0" data-imagezoom="{{asset('storage/uploads/products/original')}}/{{@$product->image_primary}}" src="{{asset('storage/uploads/products/thumbs')}}/{{@$product->image_primary}}" alt="{{@$product->name_en}}" />
                                <!-- <img class="d-block w-100" src="images/big-img-01.jpg" alt="First slide">  -->
                            </div>
                            <?php $image_more = json_decode(@$product->image_more);?>
                            @if(!empty($image_more))
                                @foreach($image_more as $kim => $imm)
                                <div class="carousel-item"> 
                                    <img class="d-block w-100" data-zoomviewposition="left" data-imagezoom="true" id="{{$kim+1}}" src="{{asset('storage/uploads/products/thumbs')}}/{{@$imm}}" alt="{{@$im}}" />
                                </div>
                                @endforeach
                            @endif
                        </div>
                        
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">{{trans('page.btn_previous')}}</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">{{trans('page.btn_next')}}</span>
                        </a>

                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="{{asset('storage/uploads/products/thumbs')}}/{{@$product->image_primary}}" alt="{{@$product->name_en}}" />
                            </li>
                            @if(!empty($image_more))
                                @foreach($image_more as $kim => $imm)
                                <li data-target="#carousel-example-1" data-slide-to="{{$kim+1}}">
                                    <img class="d-block w-100 img-fluid" src="{{asset('storage/uploads/products/thumbs')}}/{{$imm}}" alt="{{$product->name_en}}" />
                                </li>
                                @endforeach
                            @endif
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{!! $product->{'name_'.app()->getLocale()} !!}</h2>
                        @if(!empty($product->name_science))
                        <div>
                            {{trans('page.lbl_product_name_science')}}: {{$product->name_science}}
                        </div>
                        @endif
                        @if(!empty($product->size))
                        <div>
                            {{trans('page.lbl_product_size')}}: {{$product->size}}
                        </div>
                        @endif

                        @if(!empty($product->{'description_'.app()->getLocale()}))
                        <p>{{trans('page.lbl_product_description')}}:</p>
                        <p>{!! $product->{'description_'.app()->getLocale()} !!}</p>
                        @endif
                        <ul>
                            <li>
                                <div class="size-st">
                                    <label class="size-label"><strong> {{trans('page.lbl_product_price')}}: </strong> </label> &nbsp;<i class="far fa-hand-point-right"></i>&nbsp;&nbsp;

                                    <a class="btn hvr-hover btn-buy" href="{{route('frontend.contacts.index')}}" target="_blank"><i class="fas fa-envelope" aria-hidden="true"></i> {{trans('page.lbl_product_contact')}}</a>

                                    <a class="btn hvr-hover btn-buy" href="tel:084909 810 346 "><i class="fas fa-phone-square" aria-hidden="true"></i> (+84) 909 810 346</a>
                                </div>

                            {{-- <div class="share-social">
                                <a class="btn" href="javascript:void(0);"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                <a class="btn" href="javascript:void(0);"><i class="fab fa-twitter" aria-hidden="true"></i></a>
            
                            </div> --}}
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>{{trans('page.lbl_related_product')}}</h1>
                        <p class="mt-img">&nbsp;</p>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                        @if(!empty($prts))
                        @foreach($prts as $prt)
                            <div class="hover-team">
                            <div class="our-team"> 
                                <img src="{{asset('storage/uploads/products/thumbs')}}/{{$prt->image_primary}}" alt="{{$prt->image_primary}}" data-zoomviewposition="left" data-imagezoom="{{asset('storage/uploads/products/original')}}/{{$prt->image_primary}}"/>
                                <div class="team-content">
                                    <a href="{{route('frontend.products.detail',['cat_id'=>$prt->cat_id,'id'=>$prt->id])}}">
                                    <h3 class="title">{!! $prt->{'name_'.app()->getLocale()} !!}</h3> </a>
                                    @if(!empty($prt->name_science))
                                    <span class="post">{{trans('page.lbl_product_name_science')}}: {{$prt->name_science}}</span> @endif @if(!empty($prt->size))
                                    <span class="post">{{trans('page.lbl_product_size')}}: {{$prt->size}}</span> @endif
                                </div>
                                <div class="icon">
                                    <a href="" class="fas fa-eye light" aria-hidden="true"></a>
                                </div>
                            </div>
                            <div class="team-description">
                                <a href="{{route('frontend.products.detail',['cat_id'=>$prt->cat_id,'id'=>$prt->id])}}">
                                    <h3 class="title">{!! $prt->{'name_'.app()->getLocale()} !!}</h3>
                                </a>
                            </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
            </div>
        </div>
    </div>
</div>
    <!-- End Cart -->
    <!-- Start Instagram Feed  -->
@include('frontend.home.instagram')
<!-- End Instagram Feed  -->
<script>
    $('[data-imagezoom]').image<a href="https://www.jqueryscript.net/zoom/">Zoom</a>({

// image magnifier background color
cursorcolor:'255,255,255',

// opacity
opacity:0.5, 

// cursor type
cursor:'crosshair', 

// z-index
zindex:2147483647, 

// zoom view size
zoomviewsize:[500,500],

// zoom view position. left or right
zoomviewposition:'right', 

// zoom view margin
zoomviewmargin:10, 

// zoom view border
zoomviewborder:'1px solid #000',

// zoom level
magnification:3 

});
</script>
<script type="text/javascript">
    $(".cat_pro").click(function() {
        var cat_id = $(this).data("id");
        $('html, body').animate({
            scrollTop: $("#" + cat_id).offset().top - 220
        }, 600);
        return false;
    });
</script>
@endsection