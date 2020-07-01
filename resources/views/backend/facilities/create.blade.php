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
                        <a href="{{route('backend.categories.index')}}">Facility</a></li>
                    <li class="breadcrumb-item active">Create</li>
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
                        <h3 class="card-title"><strong>Facility Create</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="frm-facility-create" class="form-horizontal" role="form" method="post" action="{{route('backend.facilities.create')}}" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="title_en" class="col-sm-2 col-form-label">Title (En) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Title Name (English)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title_vi" class="col-sm-2 col-form-label">Title (Vi) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title_vi" id="title_vi" placeholder="Title Name (Vietnam)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description_en" class="col-sm-2 col-form-label">Description(En) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description_en" rows="3" placeholder="Facility Description (English)"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description_vi" class="col-sm-2 col-form-label">Description(Vi) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" name="description_vi" placeholder="Facility Description (Vietnam)"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image_primary" class="col-sm-2 col-form-label">Image <span class="red">※</span> </label>
                                <div class="col-sm-10" >
                                    <div id="img-preview" class="inline-block img-box"></div>
                                    <div class="inline-block align-left" id="div-image">
                                        <input type="file" name="image_primary" multiple  id="image_primary" placeholder="Upload image file">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="water_mark" class="col-sm-2 col-form-label">Watermark </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="water_mark" id="water_mark" placeholder="Watermark (Insert text for image)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sort" class="col-sm-2 col-form-label">Sort</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control width-sort txt-center" id="sort" name="sort" value="{{$sort}}">
                                </div>
                            </div>                            
							<div class="form-group row">
							    <label for="sort" class="col-sm-2 col-form-label">SEO</label>
							    <div class="col-sm-10">
							        <fieldset class="scheduler-border">
							            <legend class="scheduler-border">SEO Parameters</legend>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_title">SEO Title: </label>
							                <input type="text" class="input-width" id="seo_title" name="seo_title" placeholder="SEO Title" />
							            </div>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_url">SEO URL: </label>
							                <input type="text" class="input-width" id="seo_url" name="seo_url" placeholder="SEO Url" />
							            </div>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_keyword">SEO Keyword: </label>
							                <input type="text" class="input-width" id="seo_keyword" name="seo_keyword" placeholder="SEO Keyword" />
							            </div>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_description">SEO Description:</label>
							                <textarea class="input-width" id="seo_description" name="seo_description" placeholder="SEO Description"></textarea>                
							            </div>
							    	</fieldset>
							    </div>
							</div>
							<div class="form-group row">
                                <label for="sort" class="col-sm-2 col-form-label">Status</label>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" name="status" type="checkbox" id="status" value="1">
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
    jQuery.validator.addMethod(
    "onlyimages",
        function (value, element) {
            if (this.optional(element) || !element.files || !element.files[0]) {
                return true;
            } else {
                var fileType = element.files[0].type;
                var isImage = /^(image)\//i.test(fileType);
                return isImage;
            }
        }, "{{trans('validation.error_image_extension')}}"
    );

    if ($("#frm-facility-create").length > 0) {
        $("#frm-facility-create").validate({
            rules: {
                title_en: {
                    required: true
                },
                title_vi: {
                    required: true
                },
                sort: {
                    number: true
                },
                image_primary: {
                    required: true,
                    onlyimages: "image/*"
                }
            },
            messages: {
                title_en: {
                    required: "{{trans('validation.error_title_en_required')}}",
                },
                title_vi: {
                    required: "{{trans('validation.error_title_vi_required')}}",
                },
                sort: {
                    number: "{{trans('validation.error_sort_number')}}",
                },
                image_primary: {
                    required: "{{trans('validation.error_image_required')}}",
                    onlyimages: "{{trans('validation.error_image_extension')}}",
                }
            },

            errorElement: 'div',
            errorClass: 'error',
            errorPlacement: function(error, element) {
                console.log(element);
                if ( element.attr("name") == "image_primary" ){
                    error.insertAfter('#div-image');
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

        if ("{!! Session::get('danger') !!}" != "") {
            toastr.error("{!! Session::get('danger') !!}")
        }
        if ("{!! Session::get('success') !!}" != "") {
            toastr.success("{!! Session::get('success') !!}")
        }
    });
</script>

@endsection