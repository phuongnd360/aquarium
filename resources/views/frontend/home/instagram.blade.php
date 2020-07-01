<div class="instagram-box">
    <div class="main-instagram owl-carousel owl-theme">
        @if(!empty(slider_pro(false))) @foreach(slider_pro(false) as $kp=>$pro) @if(!empty($pro->image_primary))
        <div class="item">
            <div class="ins-inner-box">
                <a href="{{route('frontend.products.detail',['cat_id'=>$pro->cat_id,'id'=>$pro->id])}}">
                <img src="{{asset('storage/uploads/products/thumbs')}}/{{$pro->image_primary}}" alt="" />
                <div class="hov-in" style="margin-left: 2px; text-align: center;">
                    <div> {!! $pro->{'name_'.app()->getLocale()} !!} </div>                    
                </div>
                </a>
            </div>
        </div>
        @endif @endforeach @endif
    </div>
</div>