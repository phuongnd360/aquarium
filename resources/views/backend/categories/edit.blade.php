@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Categories Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home"></i>
                        <a href="{{route('backend.dashboard.index')}}">Home</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{route('backend.categories.index')}}">Categories</a></li>
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
                        <h3 class="card-title"><strong>Category Update</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="frm-cat-edit" class="form-horizontal" role="form" method="post" action="{{route('backend.categories.edit',$category->id)}}" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name_en" class="col-sm-2 col-form-label">Name(En) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Category Name (English)" value="{{$category->name_en}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name_vi" class="col-sm-2 col-form-label">Name(Vi) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name_vi" id="name_vi" placeholder="Category Name (Vietnam)" value="{{$category->name_vi}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sort" class="col-sm-2 col-form-label">Sort</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control width-sort txt-center" id="sort" name="sort" value="{{$category->sort}}">
                                </div>
                            </div>                            
							<div class="form-group row">
							    <label for="sort" class="col-sm-2 col-form-label">SEO</label>
							    <div class="col-sm-10">
							        <fieldset class="scheduler-border">
							            <legend class="scheduler-border">SEO Parameters</legend>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_title">SEO Title: </label>
							                <input type="text" class="input-width" id="seo_title" name="seo_title" placeholder="SEO Title" value="{{$category->seo_title}}" />
							            </div>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_url">SEO URL: </label>
							                <input type="text" class="input-width" id="seo_url" name="seo_url" placeholder="SEO Url" value="{{$category->seo_url}}"/>
							            </div>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_keyword">SEO Keyword: </label>
							                <input type="text" class="input-width" id="seo_keyword" name="seo_keyword" placeholder="SEO Keyword" value="{{$category->seo_keyword}}" />
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
                                    <input class="custom-control-input" type="checkbox" name="status" id="status" value="1" @if($category->status == 1) checked @endif >
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
<script>
    if ($("#frm-cat-edit").length > 0) {
        $("#frm-cat-edit").validate({
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

        if ("{!! Session::get('danger_edit') !!}" != "") {
            toastr.error("{!! Session::get('danger_edit') !!}")
        }
        if ("{!! Session::get('success_edit') !!}" != "") {
            toastr.success("{!! Session::get('success_edit') !!}")
        }
    });
</script>

@endsection