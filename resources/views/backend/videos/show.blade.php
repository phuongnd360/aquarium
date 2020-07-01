@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Videos Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home"></i>
                        <a href="{{route('backend.dashboard.index')}}">Home</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{route('backend.videos.index')}}">Videos</a></li>
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
                        <h3 class="card-title"><strong>Video Detail</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="frm-cat-edit" class="form-horizontal" role="form" method="post" action="{{route('backend.videos.show',$video->id)}}" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="title_en" class="col-sm-2 col-form-label">Title(En) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    {{$video->title_en}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title_vi" class="col-sm-2 col-form-label">Title(Vi) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    {{$video->title_vi}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sort" class="col-sm-2 col-form-label">Sort</label>
                                <div class="col-sm-10">
                                    {{$video->sort}}
                                </div>
                            </div>                            
							<div class="form-group row">
							    <label for="sort" class="col-sm-2 col-form-label">SEO</label>
							    <div class="col-sm-10">
							        <fieldset class="scheduler-border">
							            <legend class="scheduler-border">SEO Parameters</legend>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_title">SEO Title: </label>
							                {{$video->seo_title}}
							            </div>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_url">SEO URL: </label>
							                {{$video->seo_url}}
							            </div>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_keyword">SEO Keyword: </label>
							                {{$video->seo_keyword}}
							            </div>
							            <div class="control-group">
							                <label class="control-label input-label" for="seo_description">SEO Description:</label>
							                {{$video->seo_description}}
							            </div>
							    	</fieldset>
							    </div>
                            </div>
                            <div class="form-group row">
                                <label for="top_page" class="col-sm-2 col-form-label">Top Page </label>
                                <div class="custom-control custom-checkbox">
                                    @if($video->top_page == 1)
                                    <input disabled class="custom-control-input" readonly type="checkbox" id="top_page" checked value="1">
                                    <label for="top_page" class="custom-control-label"><span class="success">Display</span> (Video Top Page)</label>
                                    @else
                                    <label for="top_page" class="custom-control-label"><span class="success">Display</span> (Video Top Page)</label>
                                    @endif
                                </div>
                            </div>Video
							<div class="form-group row">
                                <label for="sort" class="col-sm-2 col-form-label">Status</label>
                                <div class="custom-control custom-checkbox">
                                    @if($video->status == 1)
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
                            	<button type="button" class="btn btn-default" onclick="location.href='{{route('backend.videos.index')}}'"><i class="fa fa-reply-all"></i> Back Video List</button>
                                <button type="button" class="btn btn-info" onclick="location.href='{{route('backend.videos.edit',$video->id)}}'"><i class="far fa-edit"></i> Edit</button>
                  				<button type="button" class="btn btn-danger" onclick="location.href='{{route('backend.videos.delete',$video->id)}}'"><i class="far fa-trash-alt"></i> Delete</button>
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