@extends('frontend.layouts.app',['page'=>'product']) @section('content')

<!-- Start All Title Box -->
<div class="all-title-box breadcrumb-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>{{trans('page.breadcrumb_product')}}</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('frontend.home.index')}}">{{trans('page.breadcrumb_home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('page.breadcrumb_product')}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Contact Us  -->
<div class="shop-box-inner">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                <div class="product-category">
                    <div class="filter-sidebar-left">
                        <div class="title-left">
                            <h3>{{trans('page.lbl_category')}}</h3>
                        </div>
                        <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                            @if(!empty($categories)) @foreach($categories as $kc=>$cat)
                            <a href="#" data-id="cat_{{$cat->id}}" class="cat_pro list-group-item list-group-item-action"> {!! @$cat->{'name_'.app()->getLocale()} !!} <small class="text-muted">({{@$cat->count_pro}}) </small></a> @endforeach @endif                           
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                <div class="right-product-box">
                    @if(!empty($categories)) @foreach($categories as $kc=>$cat)
                    <div class="product-item-filter row cat-product" id="cat_{{$cat->id}}">
                        <div class="col-8 col-sm-8 text-center text-sm-left txt-middle">
                            {!! @$cat->{'name_'.app()->getLocale()} !!}
                        </div>
                    </div>
                    <div class="row product-categorie-box">
                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                <div class="row">
                                    @if(!empty($products)) @foreach($products as $kp=>$product) @if($product->cat_id == $cat->id)
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">

                                        <div class="hover-team">
                                            <div class="our-team"> 
                                                <img data-zoomviewposition="left" data-imagezoom="{{asset('storage/uploads/products/original')}}/{{$product->image_primary}}" src="{{asset('storage/uploads/products/thumbs')}}/{{$product->image_primary}}" alt="{{$product->image_primary}}" />
                                                <div class="team-content">
                                                    <a href="{{route('frontend.products.detail',['cat_id'=>$product->cat_id,'id'=>$product->id])}}">
                                                    <h3 class="title">{!! $product->{'name_'.app()->getLocale()} !!}</h3> </a>@if(!empty($product->name_science))
                                                    <span class="post">Science name: {{$product->name_science}}</span> @endif @if(!empty($product->size))
                                                    <span class="post">Size: {{$product->size}}</span> @endif
                                                </div>                                                
                                                <div class="icon">
                                                    <a href="{{route('frontend.products.detail',['cat_id'=>$product->cat_id,'id'=>$product->id])}}" class="fas fa-eye light" aria-hidden="true"></a>
                                                </div>
                                            </div>
                                            <div class="team-description">
                                                <a href="{{route('frontend.products.detail',['cat_id'=>$product->cat_id,'id'=>$product->id])}}">
                                                    <h3 class="title">{!! $product->{'name_'.app()->getLocale()} !!}</h3>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    @endif @endforeach @endif
                                </div>
                            </div>

                        </div>

                    </div>
                    @endforeach @endif
                </div>

                {!! $products->links('vendor.pagination.xanhtuoi') !!}

            </div>
        </div>
    </div>
</div>

<!-- Start Instagram Feed  -->
@include('frontend.home.instagram')
<!-- End Instagram Feed  -->
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