@extends('frontend.layouts.app',['page'=>'about']) @section('content')

<!-- Start All Title Box -->
<div class="all-title-box breadcrumb-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>{{trans('page.breadcrumb_about')}}</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('frontend.home.index')}}">{{trans('page.breadcrumb_home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('page.breadcrumb_about_active')}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Contact Us  -->
<div class="contact-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="contact-info-left">
                    <h2>{{trans('page.lbl_contact_info')}}</h2>
                    <p>{!! trans('page.lbl_contact_company') !!}</p>
                    <ul class="contact-us">
                        <li>
                            <p><i class="fas fa-map-marker-alt"></i>{{trans('page.lbl_address')}}: <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d245.0047226750079!2d106.63407188115316!3d10.728655340161232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752e74955d886f%3A0x292ed1df2158ef2c!2zMTIxLCA0IEjhurttIFPhu5EgNSBN4buFIEPhu5FjLCBwaMaw4budbmcgMTUsIFF14bqtbiA4LCBI4buTIENow60gTWluaCwgVmlldG5hbQ!5e0!3m2!1sen!2sus!4v1577349657508!5m2!1sen!2sus" target="_blank"> {{trans('page.txt_address1')}}</a> </p>
                            <p><i class="fas fa-map-marker-alt"></i>{{trans('page.lbl_address1')}}: <a href="https://maps.google.com/?ll=38.882147,-76.99017" target="_blank"> {{trans('page.txt_address2')}}</a> </p>
                        </li>
                        <li>
                            <p><i class="fas fa-phone-square"></i>{{trans('page.lbl_phone')}}: <a href="tel:+84-2836201608">(+84) 283 620 1608</a></p>
                        </li>
                        <li>
                            <p><i class="fas fa-fax"></i>Fax: <a href="tel:+84-2836201609">(+84) 283 620 1609</a></p>
                        </li>
                        <li>
                            <p><i class="fas fa-envelope"></i>Email: <a href="mailto:tuoi@xanhtuoiaquarium.com">tuoi@xanhtuoiaquarium.com</a></p>
                            <p style="margin-left: 70px;"><a href="mailto:tuoi@xanhtuoitropicalfish.com">tuoi@xanhtuoitropicalfish.com</a></p>

                            <p style="margin-left: 70px;"><a href="mailto:nga@xanhtuoitropicalfish.com">nga@xanhtuoitropicalfish.com</a></p>
                            <p style="margin-left: 70px;"><a href="mailto:nga@xanhtuoiaquarium.com">nga@xanhtuoiaquarium.com</a></p>

                            <p style="margin-left: 70px;"><a href="mailto:tinh@xanhtuoitropicalfish.com">tinh@xanhtuoitropicalfish.com</a></p>
                            <p style="margin-left: 70px;"><a href="mailto:tinh@xanhtuoiaquarium.com">tinh@xanhtuoiaquarium.com</a></p>

                            <p style="margin-left: 70px;"><a href="mailto:thang@xanhtuoitropicalfish.com">thang@xanhtuoitropicalfish.com</a></p>
                            <p style="margin-left: 70px;"><a href="mailto:thang@xanhtuoiaquarium.com">thang@xanhtuoiaquarium.com</a></p>

                            <p style="margin-left: 70px;"><a href="mailto:van@xanhtuoitropicalfish.com">van@xanhtuoitropicalfish.com</a></p>
                            <p style="margin-left: 70px;"><a href="mailto:van@xanhtuoiaquarium.com">van@xanhtuoiaquarium.com</a></p>
                            
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <!-- Form About -->
                <div class="contact-form-right">
                    <div class="container">
                    	@if(app()->getLocale() == 'en') @include('frontend.about.about_en')
                        @else @include('frontend.about.about_vi') @endif
                    </div>
                </div>
                <!-- /Form About -->
            </div>
        </div>
    </div>
</div>

<!-- Start Instagram Feed  -->
@include('frontend.home.instagram')
<!-- End Instagram Feed  -->

@endsection