@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Facility Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home"></i>
                        <a href="{{route('backend.dashboard.index')}}">Home</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{route('backend.facilities.index')}}">Facility</a></li>
                    <li class="breadcrumb-item active">Update</li>
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
                        <h3 class="card-title"><strong>Facility Update</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="frm-facility-edit" class="form-horizontal" role="form" method="post" action="{{route('backend.facilities.edit',$facility->id)}}" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="title_en" class="col-sm-2 col-form-label">Title(En) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Facility Title (English)" value="{{$facility->title_en}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title_vi" class="col-sm-2 col-form-label">Title(Vi) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title_vi" id="title_vi" placeholder="Facility Title (Vietnam)" value="{{$facility->title_vi}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description_en" class="col-sm-2 col-form-label">Description(En) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" name="description_en" placeholder="Facility Description (English)">{{$facility->description_en}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description_vi" class="col-sm-2 col-form-label">Description(Vi) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description_vi" rows="3" placeholder="Facility Description (Vietnam)">{{$facility->description_vi}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image_primary" class="col-sm-2 col-form-label">Image Primary </label>
                                <div class="col-sm-10" >
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Image Primary</legend>
                                    <div id="img-preview" class="img-box">
                                        @if(!empty($facility->image_primary))
                                        <a href="{{asset('storage/uploads/facilities/thumbs')}}/{{$facility->image_primary}}" target="_blank">
                                        <img src="{{asset('storage/uploads/facilities/thumbs')}}/{{$facility->image_primary}}" class="img-product"></a>
                                        @else
                                        <img src="{{asset('public/backend/img/No-Image.png')}}" class=" img-product" alt="{{$facility->image_primary}}">
                                        @endif
                                    </div>
                                    <div class="inline-block align-left div-image">
                                        <div class="inline-block">
                                            <label class="block"><input type="radio" id="radio_img_primary1" name="radio_img_primary" value="1" placeholder="Not change" checked > Not Change</label>
                                            <label class="block"><input type="radio" id="radio_img_primary2" name="radio_img_primary" value="2" placeholder=""> Change Image</label>
                                            <label class="block"><input type="radio" id="radio_img_primary3" name="radio_img_primary" value="3" placeholder="Delete"> Delete</label>
                                        </div>
                                        <div class="inline-block">
                                            <input type="file" name="image_primary" id="image_primary" placeholder="Upload primary image file">
                                        </div>
                                    </div>                                    
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="water_mark" class="col-sm-2 col-form-label">Watermark </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$facility->water_mark}}" name="water_mark" id="water_mark" placeholder="Watermark (Insert text for image)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sort" class="col-sm-2 col-form-label">Sort</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control width-sort txt-center" id="sort" name="sort" value="{{$facility->sort}}">
                                </div>
                            </div>                            
							<div class="form-group row">
							    <label for="sort" class="col-sm-2 col-form-label">SEO</label>
							    <div class="col-sm-10">
							        <fieldset class="scheduler-border">
							            <legend class="scheduler-border">SEO Parameters</legend>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_title">SEO Title: </label>
							                <input type="text" class="input-width" id="seo_title" name="seo_title" placeholder="SEO Title" value="{{$facility->seo_title}}" />
							            </div>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_url">SEO URL: </label>
							                <input type="text" class="input-width" id="seo_url" name="seo_url" placeholder="SEO Url" value="{{$facility->seo_url}}"/>
							            </div>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_keyword">SEO Keyword: </label>
							                <input type="text" class="input-width" id="seo_keyword" name="seo_keyword" placeholder="SEO Keyword" value="{{$facility->seo_keyword}}" />
							            </div>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_description">SEO Description:</label>
							            </div>
							    	</fieldset>
							    </div>
							</div>
							<div class="form-group row">
                                <label for="sort" class="col-sm-2 col-form-label">Status</label>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="status" id="status" value="1" @if($facility->status == 1) checked @endif >
                                    <label for="status" class="custom-control-label red">Not Display</label>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script type="text/javascript" src="http://example.com/image-uploader.min.js"></script>
<script type="text/javascript" src="{{ asset('public/backend') }}/plugins/bootstrap-filestyle/js/bootstrap-filestyle.js"></script>
<script>
    $('#image_primary').filestyle({
        buttonText : 'Choose file',
        buttonName : 'btn-primary btn-radius-right'
    });   
</script>
<script>
    $('#image_primary').change(function(){
        $( "#radio_img_primary2" ).prop( "checked", true );           
     });
</script>
<script>
    if ($("#frm-facility-edit").length > 0) {
        $("#frm-facility-edit").validate({
            rules: {
                title_en: {
                    required: true
                },
                title_vi: {
                    required: true
                },
                sort: {
                    number: true
                }
            },
            messages: {
                title_en: {
                    required: "{{trans('validation.error_facility_title_en_required')}}",
                },
                title_vi: {
                    required: "{{trans('validation.error_facility_title_vi_required')}}",
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
    $('#image_primary').change(function() {
        var fileInput = document.getElementById('image_primary');
        var file_type = fileInput.files[0];
        if (fileInput.files && file_type.type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('img-preview').innerHTML = '<img src="'+e.target.result+'" />';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }      
    });
</script>

<script type="text/javascript">
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        if ("{!! Session::get('danger_edit') !!}" != "") {
            toastr.error("{!! Session::get('danger_edit') !!}")
        }
        if ("{!! Session::get('success_edit') !!}" != "") {
            toastr.success("{!! Session::get('success_edit') !!}")
        }
    });
</script>

@endsection