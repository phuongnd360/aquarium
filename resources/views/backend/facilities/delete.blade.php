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
                    <li class="breadcrumb-item active">Delete</li>
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
                        <h3 class="card-title"><span class="red">※ Are you sure you want to delete?</span></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="frm-facility-delete" class="form-horizontal" role="form" method="post" action="{{route('backend.facilities.delete', $facility->id)}}" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="title_en" class="col-sm-2 col-form-label">Title (En) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    {{$facility->title_en}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title_vi" class="col-sm-2 col-form-label">Title (Vi) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    {{$facility->title_vi}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description_en" class="col-sm-2 col-form-label">Description (En) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    {!! $facility->description_en !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description_vi" class="col-sm-2 col-form-label">Description (Vi) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    {!! $facility->description_vi !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="size" class="col-sm-2 col-form-label">Image Primary </label>
                                <div class="col-sm-10">
                                    @if(!empty($facility->image_primary))
                                    <a href="{{asset('storage/uploads/facilities/thumbs')}}/{{$facility->image_primary}}" title="View Image" target="_blank">
                                    <img src="{{asset('storage/uploads/facilities/thumbs')}}/{{$facility->image_primary}}" class="img-product-show" alt="{{$facility->image_primary}}"></a>
                                    @else
                                    <img src="{{asset('public/backend/img/No-Image.png')}}" class="img-product-show" alt="{{$facility->image_primary}}">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sort" class="col-sm-2 col-form-label">Sort</label>
                                <div class="col-sm-10">
                                    {{$facility->sort}}
                                </div>
                            </div>                            
                            <div class="form-group row">
                                <label for="sort" class="col-sm-2 col-form-label">SEO</label>
                                <div class="col-sm-10">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">SEO Parameters</legend>
                                        <div class="control-group">
                                            <label class="control-label input-label" for="seo_title">SEO Title: </label>
                                            {{$facility->seo_title}}
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label input-label" for="seo_url">SEO URL: </label>
                                            {{$facility->seo_url}}
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label input-label" for="seo_keyword">SEO Keyword: </label>
                                            {{$facility->seo_keyword}}
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label input-label" for="seo_description">SEO Description:</label>
                                            {{$facility->seo_description}}
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sort" class="col-sm-2 col-form-label">Status</label>
                                <div class="custom-control custom-checkbox">
                                    @if($facility->status == 1)
                                    <label for="status" class="custom-control-label red">Not Display</label>
                                    @else
                                    <input disabled class="custom-control-input" readonly type="checkbox" id="status" checked value="1">
                                    <label for="status" class="custom-control-label green">Display</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="offset-sm-2">
                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
                                <button type="button" class="btn btn-default" onclick="location.href='{{route('backend.facilities.index')}}'"><i class="fa fa-reply-all"></i> Back Category List</button>
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

<script type="text/javascript">
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        if ("{!! Session::get('danger_delete') !!}" != "") {
            toastr.error("{!! Session::get('danger_delete') !!}")
        }
        if ("{!! Session::get('success_delete') !!}" != "") {
            toastr.success("{!! Session::get('success_delete') !!}")
        }
    });
</script>

@endsection