@extends('backend.layouts.app') @section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Products Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home"></i>
                        <a href="{{route('backend.dashboard.index')}}">Home</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{route('backend.products.index')}}">Products</a></li>
                    <li class="breadcrumb-item active">Copy</li>
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
                        <h3 class="card-title"><strong>Product Copy</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form name="frm-pro-copy" id="frm-pro-copy" class="form-horizontal" role="form" method="post" action="{{route('backend.products.copy', $product->id)}}" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="cat_id" class="col-sm-2 col-form-label">Category <span class="red">※</span></label>
                                <div class="col-sm-4">
                                    <select name="cat_id" id="cat" class="form-control txt-center">
                                      <option value="">----- All -----</option>
                                      @if(!empty($categories))
                                      @foreach($categories as $key => $category)
                                      <option value="{{$key}}" @if($product->cat_id == $key) selected @endif >{{$category}}</option>                 
                                      @endforeach
                                      @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name_en" class="col-sm-2 col-form-label">Name(En) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Name (English)" value="{{$product->name_en}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name_vi" class="col-sm-2 col-form-label">Name(Vi) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$product->name_vi}}" name="name_vi" id="name_vi" placeholder="Name (Vietnam)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name_science" class="col-sm-2 col-form-label">Name(Sience) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$product->name_science}}" name="name_science" id="name_science" placeholder="Name (Science)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description_en" class="col-sm-2 col-form-label">Description (En)</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="5" name="description_en" id="description_en" placeholder="Description English">{{$product->description_en}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description_vi" class="col-sm-2 col-form-label">Description (Vi)</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="5" name="description_vi" id="description_vi" placeholder="Description Vietnam">{{$product->description_vi}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="size" class="col-sm-2 col-form-label">Size </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$product->size}}" name="size" id="size" placeholder="Size">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sort" class="col-sm-2 col-form-label">Gallery</label>
                                <div class="custom-control custom-checkbox">
                                	<input class="custom-control-input" name="gallery" type="checkbox" id="gallery" value="1" @if($product->gallery == 1) checked @endif >
                                    <label for="gallery" class="custom-control-label"><span class="success">Display</span> (Our Gallery Top Page)</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sort" class="col-sm-2 col-form-label">Sort</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control width-sort txt-center" id="sort" name="sort" value="{{$sort}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image_primary" class="col-sm-2 col-form-label">Image Primary </label>
                                <div class="col-sm-10" >
                                	<fieldset class="scheduler-border">
							            <legend class="scheduler-border">Image Primary</legend>
                                    <div id="img-preview" class="img-box">
                                    	@if(!empty($product->image_primary))
                                    	<img src="{{asset('storage')}}{{$product->image_primary}}" class="img-circle img-product">
                                    	@else
                                    	<img src="{{asset('public/backend/img/No-Image.png')}}" class="img-circle img-product" alt="{{$product->image_primary}}">
                                    	@endif
                                    </div>
                                    <div class="inline-block align-left">
                                    	<div class="inline-block">
                                    		<label class="block"><input type="radio" id="radio_img_primary1" name="radio_img_primary" value="1" placeholder="Not change" checked > Not Change</label>
                                    		<label class="block"><input type="radio" id="radio_img_primary2" name="radio_img_primary" value="2" placeholder=""> Change Image</label>
                                    		<label class="block"><input type="radio" id="radio_img_primary3" name="radio_img_primary" value="3" placeholder="Delete"> Delete</label>
                                    	</div>
                                    	<div class="inline-block">
	                                        <input type="file" name="image_primary" multiple  id="image_primary" placeholder="Upload primary image file">
	                                    </div>
                                    </div>
                                    
                                    </fieldset>
                                    <input type="hidden" name="old_image_primary" value="{{$product->image_primary}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image_more" class="col-sm-2 col-form-label">Image More </label>
                                <div class="col-sm-10">
                                	<fieldset class="scheduler-border">
							            <legend class="scheduler-border">Image More</legend>
                                    <div class="img-more-input img-more-box" id="img-preview-more">
                                    	@if(!empty($product->image_more))
                                    		<?php $image_more = json_decode($product->image_more); ?>
                                    		@foreach($image_more as $key => $imgMore)
                                    		<img src="{{asset('storage')}}{{$imgMore}}" class="img-circle img-product">
                                    		@endforeach
                                    	@endif
                                    	
                                    </div>
                                    <div class="img-more-input">
                                    	<div class="inline-block">
                                    		<label class="block"><input type="radio" id="radio_img_more1" name="radio_img_more" value="1" placeholder="Not change" checked > Not Change</label>
                                    		<label class="block"><input type="radio" id="radio_img_more2" name="radio_img_more" value="2" placeholder=""> Change Image</label>
                                    		<label class="block"><input type="radio" id="radio_img_more3" name="radio_img_more" value="3" placeholder="Delete"> Delete</label>
                                    	</div>
                                    	<div class="inline-block">
	                                        <input type="file" id="image_more" name="image_more[]" multiple  value="" placeholder="Upload more image file">
	                                    </div>
                                    </div>

                                </fieldset>
                                <input type="hidden" name="old_image_more" value="{{$product->image_more}}">                                   
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <label for="water_mark" class="col-sm-2 col-form-label">Watermark </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$product->water_mark}}" name="water_mark" id="water_mark" placeholder="Watermark (Insert text for image)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sort" class="col-sm-2 col-form-label">Top Page</label>
                                <div class="custom-control custom-checkbox">
                                	<input class="custom-control-input" name="top_page" type="checkbox" id="top_page" value="1" @if($product->top_page == 1) checked @endif >
                                    <label for="top_page" class="custom-control-label"><span class="success">Display</span> (Product Top Page)</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sort" class="col-sm-2 col-form-label">Status</label>
                                <div class="custom-control custom-checkbox">
                                	@if( empty($product->status) )
                                	<input class="custom-control-input" name="status" type="checkbox" id="status" value="1" >
                                    <label for="status" class="custom-control-label red">Not Display</label>
                                    @else
                                    <input class="custom-control-input" name="status" type="checkbox" id="status" value="1" checked >
                                    <label for="status" class="custom-control-label red">Not Display</label>
                                    @endif
                                </div>
                            </div>
							<div class="form-group row">
							    <label for="sort" class="col-sm-2 col-form-label">SEO</label>
							    <div class="col-sm-10">
							        <fieldset class="scheduler-border">
							            <legend class="scheduler-border">SEO Parameters</legend>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_title">SEO Title: </label>
							                <input type="text" class="input-width" id="seo_title" name="seo_title" placeholder="SEO Title" value="{{$product->seo_title}}" />
							            </div>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_url">SEO URL: </label>
							                <input type="text" class="input-width" id="seo_url" name="seo_url" placeholder="SEO Url" value="{{$product->seo_url}}" />
							            </div>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_keyword">SEO Keyword: </label>
							                <input type="text" class="input-width" id="seo_keyword" name="seo_keyword" placeholder="SEO Keyword" value="{{$product->seo_keyword}}" />
							            </div>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_description">SEO Description:</label>
							                <textarea class="input-width" id="seo_description" name="seo_description" placeholder="SEO Description">{!! $product->seo_description !!}</textarea>                
							            </div>
							    	</fieldset>
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

<script type="text/javascript" src="http://example.com/jquery.min.js"></script>
<script type="text/javascript" src="http://example.com/image-uploader.min.js"></script>
<script type="text/javascript" src="{{ asset('public/backend') }}/plugins/bootstrap-filestyle/js/bootstrap-filestyle.js"></script>
<script>
    $('#image_primary').filestyle({
        buttonText : 'Choose file',
        buttonName : 'btn-primary btn-radius-right'
    });

    $('#image_more').filestyle({
        buttonText : 'Choose file',
        buttonName : 'btn-primary btn-radius-right'
    });
</script>
<script>
	$('#image_primary').change(function(){
        $( "#radio_img_primary2" ).prop( "checked", true );           
     });
	$('#image_more').change(function(){
        $( "#radio_img_more2" ).prop( "checked", true );           
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


    if ($("#frm-pro").length > 0) {
        $("#frm-pro").validate({
            rules: {
                name_en: {
                    required: true
                },
                name_vi: {
                    required: true
                },
                sort: {
                    number: true
                },
                image_primary: {
                    onlyimages: "image/*"
                },
                image_more: {
                    onlyimages: "image/*"
                }
            },
            messages: {
                name_en: {
                    required: "{{trans('validation.error_product_name_en_required')}}",
                },
                name_vi: {
                    required: "{{trans('validation.error_product_name_vi_required')}}",
                },
                sort: {
                    number: "{{trans('validation.error_sort_number')}}",
                },
                image_primary: {
                    onlyimages: "{{trans('validation.error_image_extension')}}",
                },
                image_more: {
                    onlyimages: "{{trans('validation.error_image_extension')}}"
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
    	$('#img-preview').empty();
        var fileInput = document.getElementById('image_primary');

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('img-preview').innerHTML = '<img class="img-circle img-product" src="'+e.target.result+'" />';
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
      
    });

    $('#image_more').change(function() {
    	$('#img-preview-more').empty();
        var total_file=document.getElementById("image_more").files.length;
        for(var i=0;i<total_file;i++)
        {
            if(total_file != 0){
                $('#img-preview-more').append('<img class="img-circle img-product" src="'+URL.createObjectURL(event.target.files[i])+'">');
            }
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