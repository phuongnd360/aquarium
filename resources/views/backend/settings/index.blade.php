@extends('backend.layouts.app') @section('content')
 <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Settings Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home"></i>
                        <a href="{{route('backend.dashboard.index')}}">Home</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{route('backend.settings.index')}}">Settings</a></li>
                    <li class="breadcrumb-item active">Mail</li>
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
                        <h3 class="card-title"><strong>Mail Setting</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="frm-setting" class="form-horizontal" role="form" method="post" action="{{route('backend.settings.index')}}" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{@$setting->id}}">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="mail_to" class="col-sm-2 col-form-label">Mail (To) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="mail_to" id="mail_to" placeholder="Mail address to receive for contact" value="{{@$setting->mail_to}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mail_cc" class="col-sm-2 col-form-label">Mail (Cc) </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="mail_cc" id="mail_cc" placeholder="Mail address to receive for contact" value="{{@$setting->mail_cc}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mail_bcc" class="col-sm-2 col-form-label">Mail (Bcc) </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="mail_bcc" id="mail_bcc" placeholder="Mail address to receive for contact" value="{{@$setting->mail_bcc}}">
                                </div>
                            </div>                            
                            <div class="form-group row">
                                <label for="signature" class="col-sm-2 col-form-label">Signature <span class="red">※</span></label>
                                <div class="col-sm-10">
                                	<textarea id="signature" name="signature" class="form-control textarea" placeholder="Mail Signature" rows="6">{{@$setting->signature}}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="offset-sm-2">
                                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Save</button>
                                <button type="reset" class="btn btn-default"><i class="fas fa-sync-alt"></i> Reset</button>
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

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script>
    if ($("#frm-setting").length > 0) {
        $("#frm-setting").validate({
            rules: {
                name_en: {
                    required: true
                },
                name_vi: {
                    required: true
                },
                sort: {
                    number: true
                }
            },
            messages: {
                name_en: {
                    required: "{{trans('validation.error_cat_name_en_required')}}",
                },
                name_vi: {
                    required: "{{trans('validation.error_cat_name_vi_required')}}",
                },
                sort: {
                    number: "{{trans('validation.error_sort_number')}}",
                }
            },

            errorElement: 'div',
            errorClass: 'error',
            errorPlacement: function(error, element) {
                if (element.parent('.input-group-append').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }

        })
    }
</script>

<script type="text/javascript">
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        if ("{!! Session::get('danger') !!}" != "") {
            toastr.error("{!! Session::get('danger') !!}")
        }
        if ("{!! Session::get('success') !!}" != "") {
            toastr.success("{!! Session::get('success') !!}")
        }
    });
</script>

@endsection