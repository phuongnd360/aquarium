@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Contact Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home"></i>
                        <a href="{{route('backend.dashboard.index')}}">Home</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{route('backend.contacts.index')}}">Contact</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Contact Detail</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="frm-contact-edit" class="form-horizontal" role="form" method="post" action="{{route('backend.contacts.show',$contact->id)}}" accept-charset="utf-8" enctype="multipart/form-data">
                        <?php $decodedLocation = getInfoByIP($contact->ip_address);?>
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="message" class="col-sm-2 col-form-label">Message</label>
                                <div class="col-sm-10">
                                    {!! $contact->content !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-10">
                                    {{$contact->name}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                                <div class="col-sm-10">
                                    {{$contact->email}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    {{$contact->phone}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lang" class="col-sm-2 col-form-label">Language</label>
                                <div class="col-sm-10">
                                    {{$contact->lang}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="created_at" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    {{$contact->created_at}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ip_address" class="col-sm-2 col-form-label">IP Address</label>
                                <div class="col-sm-10">
                                	@if(!empty($contact->ip_address))
                                	<a href="#multiCollapseExample1" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" title="More View Click">{{$contact->ip_address}}</a> <i class="far fa-hand-point-left"></i> Click
                                    @endif
                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
						              <div class="card card-body">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">Customer Information</legend>
                                            <div class="control-group">
                                                <label class="control-label input-label" for="seo_title">Address: <img class="flag-country" src="{{@$decodedLocation['country_flag']}}" alt="{{@$decodedLocation['country_name']}}">
                                                @if(!empty($decodedLocation['country_name']))
                                                {{@$decodedLocation['district']}}, {{@$decodedLocation['city']}}, {{@$decodedLocation['country_name']}}. 
                                                @endif
                                            </label>
                                            </div>                                        
                                        </fieldset>

    							      </div>
							    </div>

                                </div>
                            </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="offset-sm-2">
                            	<button type="button" class="btn btn-default" onclick="location.href='{{route('backend.contacts.index')}}'"><i class="fa fa-reply-all"></i> Back Contact List</button>
                  				<button type="button" class="btn btn-danger" onclick="location.href='{{route('backend.contacts.delete',$contact->id)}}'"><i class="far fa-trash-alt"></i> Delete</button>
                            </div>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection