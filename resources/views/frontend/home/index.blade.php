@extends('frontend.layouts.app',['page'=>'home'])
@section('content')
<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        {!! get_silder() !!}
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
<!-- End Slider -->

<!-- Start Categories  -->
@if( count(get_gallery()) > 0 )
<div class="categories-shop" id="div-gallery">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>{{trans('page.header_gallery')}}</h1>
                    <p class="mt-img">&nbsp;</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content">
                @if(!empty(get_gallery())) 
                @foreach(get_gallery() as $kp=>$product)
                @if(!empty($product->image_primary))                
                <a class="elem" href="{{asset('storage/uploads/products/thumbs')}}/{{$product->image_primary}}" title="{!! $product->{'name_'.app()->getLocale()} !!}" data-lcl-txt="{!! $product->{'description_'.app()->getLocale()} !!}" data-lcl-author="{{$product->name_science}}" data-lcl-thumb="{{asset('storage/uploads/products/thumbs')}}/{{$product->image_primary}}">
                <span style="background-image: url('{{asset('storage/uploads/products/thumbs')}}/{{$product->image_primary}}');"></span>
                </a> 
                @endif
                <?php  $image_more = json_decode($product->image_more); ?>
                @if(!empty($image_more)) @foreach($image_more as $imgm)
                <a class="elem" href="{{asset('storage/uploads/products/thumbs')}}/{{$imgm}}" title="{!! $product->{'name_'.app()->getLocale()} !!}" data-lcl-txt="{!! $product->{'description_'.app()->getLocale()} !!}" data-lcl-author="{{$product->name_science}}" data-lcl-thumb="{{asset('storage/uploads/products/thumbs')}}/{{$imgm}}">
                <span style="background-image: url('{{asset('storage/uploads/products/thumbs')}}/{{$imgm}}');"></span>
                </a>
                @endforeach 
                @endif 
                @endforeach 
                @endif
                <br/>
            </div>
        </div>
        <!-- LIGHTBOX INITIALIZATION -->
        <script>
            $(document).ready(function(){
                lc_lightbox('.elem', {
                    wrap_class: 'lcl_fade_oc',
                    gallery: true,
                    thumb_attr: 'data-lcl-thumb',
                    skin: 'minimal',
                    radius: 1,
                    padding: 0,
                    border_w: 1,
                });
            });
        </script>
    </div>
</div>
@endif
<!-- End Categories -->

<!-- Start Products  -->
@if( count($products) > 0 )
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>{{trans('page.header_product')}}</h1>
                    <p class="mt-img">&nbsp;</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="*">{{trans('page.lbl_cat_all')}}</button>
                        @if(!empty($categories)) @foreach($categories as $kc=>$cat)
                        <button data-filter=".{{$cat->id}}">{!! $cat->{'name_'.app()->getLocale()} !!}</button>
                        @endforeach @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Products -->
        <div class="row special-list">
            @foreach($products as $kp=>$product)
            <div class="col-lg-3 col-md-6 special-grid {{$product->cat_id}}">
                <div class="hover-team">
                    <div class="our-team"> <img src="{{asset('storage/uploads/products/thumbs')}}/{{$product->image_primary}}" alt="{{$product->image_primary}}" />
                        <div class="team-content">
                            <a href="{{route('frontend.products.detail',['cat_id'=>$product->cat_id, 'id'=>$product->id])}}">
                            <h3 class="title">{!! $product->{'name_'.app()->getLocale()} !!}</h3>
                            </a>
                            <span class="post">{{$product->name_science}}</span>
                        </div>                        
                        <div class="icon"> <a href="#" class="fas fa-eye light" aria-hidden="true"></a> </div>
                    </div>
                    <div class="team-description">
                        <a href="{{route('frontend.products.detail',['cat_id'=>$product->cat_id, 'id'=>$product->id])}}">
                            <h3 class="title">{!! $product->{'name_'.app()->getLocale()} !!}</h3>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if(count($products) > 0)
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <a class="btn hvr-hover" href="{{route('frontend.products.index')}}">{{trans('page.btn_view_more')}} &raquo;</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endif
<!-- End Products  -->
<!-- Start Blog  -->
@if( count($videos) > 0 )
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center" id="videos">
                    <h1>Videos</h1>
                    <p class="mt-img">&nbsp;</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($videos as $kv=>$video)
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="blog-box">
                    @if($video->type_video == 1)
                    <div class="blog-img">
                        {!! $video->embed_video !!}
                    </div>
                    @elseif($video->type_video == 2)
                        <div class="blog-img">
                            <video style="width: 350px; height: 300px;" controls crossorigin playsinline poster="{{asset('storage/uploads/videos')}}/{{$video->poster}}" id="player" >
                                <source src="{{asset('storage/uploads/videos')}}/{{$video->url}}" type="video/mp4" size="576"> 
                                 <track
                                    kind="captions"
                                    label="English"
                                    srclang="en"
                                    src=""
                                    default
                                />
                            </video>
                        </div>
                    @endif
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3>{!! $video->{'title_'.app()->getLocale()} !!}</h3>
                        </div>
                        <ul class="option-blog">
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if(count($videos) > 0)
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <a class="btn hvr-hover" href="{{route('frontend.videos.index')}}">{{trans('page.btn_view_more')}} &raquo;</a>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endif
<!-- End Blog  -->
@endsection