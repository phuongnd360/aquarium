@extends('frontend.layouts.app',['page'=>'contact']) @section('content')

<!-- Start All Title Box -->
<div class="all-title-box breadcrumb-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>{{trans('page.breadcrumb_contact')}}</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('frontend.home.index')}}">{{trans('page.breadcrumb_home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('page.breadcrumb_contact_active')}}</li>
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
                    <p><p>{!! trans('page.lbl_contact_company') !!}</p></p>
                    <ul class="contact-us">
                        <li>
                            <p><i class="fas fa-map-marker-alt"></i>{{trans('page.lbl_address')}}: <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d245.0047226750079!2d106.63407188115316!3d10.728655340161232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752e74955d886f%3A0x292ed1df2158ef2c!2zMTIxLCA0IEjhurttIFPhu5EgNSBN4buFIEPhu5FjLCBwaMaw4budbmcgMTUsIFF14bqtbiA4LCBI4buTIENow60gTWluaCwgVmlldG5hbQ!5e0!3m2!1sen!2sus!4v1577349657508!5m2!1sen!2sus" target="_blank"> {{trans('page.txt_address1')}}</a> </p>
                            <p><i class="fas fa-map-marker-alt"></i>{{trans('page.lbl_address1')}}: <a href="https://maps.google.com/?ll=38.882147,-76.99017" target="_blank">{{trans('page.txt_address2')}}</a> </p>
                        </li>
                        <li>
                            <p><i class="fas fa-phone-square"></i>{{trans('page.lbl_phone')}}: <a href="tel:+84-2836201608">(+84) 283 620 1608</a></p>
                        </li>
                        <li>
                            <p><i class="fas fa-fax"></i>Fax: <a href="tel:+84-2836201609">(+84) 283 620 1609</a></p>
                        </li>
                        <li>
                            <p><i class="fas fa-envelope"></i>Email: <a href="mailto:tuoi@xanhtuoiaquarium.com">tuoi@xanhtuoiaquarium.com</a></p>
                            <p style="margin-left: 20px;"><a href="mailto:tuoi@xanhtuoitropicalfish.com">tuoi@xanhtuoitropicalfish.com</a></p>

                            <p style="margin-left: 20px;"><a href="mailto:nga@xanhtuoitropicalfish.com">nga@xanhtuoitropicalfish.com</a></p>
                            <p style="margin-left: 20px;"><a href="mailto:nga@xanhtuoiaquarium.com">nga@xanhtuoiaquarium.com</a></p>

                            <p style="margin-left: 20px;"><a href="mailto:tinh@xanhtuoitropicalfish.com">tinh@xanhtuoitropicalfish.com</a></p>
                            <p style="margin-left: 20px;"><a href="mailto:tinh@xanhtuoiaquarium.com">tinh@xanhtuoiaquarium.com</a></p>

                            <p style="margin-left: 20px;"><a href="mailto:thang@xanhtuoitropicalfish.com">thang@xanhtuoitropicalfish.com</a></p>
                            <p style="margin-left: 20px;"><a href="mailto:thang@xanhtuoiaquarium.com">thang@xanhtuoiaquarium.com</a></p>

                            <p style="margin-left: 20px;"><a href="mailto:van@xanhtuoitropicalfish.com">van@xanhtuoitropicalfish.com</a></p>
                            <p style="margin-left: 20px;"><a href="mailto:van@xanhtuoiaquarium.com">van@xanhtuoiaquarium.com</a></p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="contact-form-right">
                    <div class="area-mail">
                        <p><a href="mailto:tuoi@xanhtuoitropicalfish.com"><i class="fas fa-envelope"></i> tuoi@xanhtuoitropicalfish.com </a>
                            or <a href="mailto:xanhtuoitropicalfishcompany@gmail.com "> xanhtuoitropicalfishcompany@gmail.com </a></p>
                    </div>
                    <div>
                        <nav class="idealsteps-nav">
                            <ul>
                                <li class="">
                                    <a class="step-width" href="javascript:void(0);" tabindex="-1" marked="1" googl="true">{{trans('page.steps')}} 1.<span class="counter">{{trans('page.input')}}</span></a></li>
                                <li class="active">
                                    <a class="step-width" href="javascript:void(0);" tabindex="-1" marked="1">{{trans('page.steps')}} 2.<span class="counter">{{trans('page.confirm')}}</span></a>
                                </li>
                                <li class="">
                                    <a class="step-width" href="javascript:void(0);" tabindex="-1" marked="1">{{trans('page.steps')}} 3.<span class="counter">{{trans('page.sent')}}</span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <p><span class="red">※</span>{{trans('page.input_info_confirm')}}</p>
                    <form id="frm-contact" method="post" action="{{route('frontend.contacts.confirm')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group input-icons frm-border">
                                    <label for="name">Name: </label>
                                    {{@$contact['name']}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group input-icons frm-border">
                                    <label for="email">E-mail: </label>
                                    {{@$contact['email']}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group frm-border">
                                    <label for="phone">Phone: </label>
                                    {{@$contact['phone']}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group input-icons frm-border">
                                    <label for="messaage">Message: </label>
                                    <div> {!! @nl2br(e($contact['content'])) !!} </div>
                                </div>
                                <div class="submit-button text-center">
                                    <button class="btn btn-default-hover" type="button" onClick="location.href='{{route('frontend.contacts.back')}}'">← {{trans('page.btn_back')}}</button>
                                    20utton class="btn hvr-hover" type="submit">&nbsp; {{trans('page.btn_send')}} → &nbsp;</button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /Form Contact -->
            </div>
        </div>
        <div>
            <div style="overflow:hidden;width: auto;position: relative;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d980.3069148405231!2d106.6396759996835!3d10.63941410799871!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752faa14aaadd3%3A0x6ef875c8623cf16e!2sXANH%20TUOI%20TROPICAL%20FISH%20CO.%2CLTD%20(%20BRANCH)!5e0!3m2!1sen!2s!4v1586876235504!5m2!1sen!2s&lang=en" width="1120" height="450" frameborder="0" style="border:0;" allowfullscreen="yes"></iframe>
            </div>
            <br />
        </div>
    </div>

</div>

<!-- Start Instagram Feed  -->
@include('frontend.home.instagram')
<!-- End Instagram Feed  -->

@endsection