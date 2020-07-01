@extends('frontend.layouts.app',['page'=>'video']) @section('content')

<!-- Start All Title Box -->
<div class="all-title-box breadcrumb-box" style="background-image: url('{{ asset('public/common/images/B15.jpg')}}') no-repeat center center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>{{trans('page.breadcrumb_video')}}</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('frontend.home.index')}}">{{trans('page.breadcrumb_home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('page.breadcrumb_video')}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Contact Us  -->
<div class="shop-box-inner">                                   
    @if( !empty($videos) )
        <div class="container">
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
                                <video style="width: 100%; height: 100%;" controls crossorigin playsinline poster="{{asset('storage/uploads/videos')}}/{{$video->poster}}" id="player" >
                                    <source src="{{asset('storage/uploads/videos')}}/{{$video->url}}" type="video/mp4"> 
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
        </div>                                    
    @endif
</div>
<!-- Start Instagram Feed  -->
@include('frontend.home.instagram')
<!-- End Instagram Feed  -->
@endsection