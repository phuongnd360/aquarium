@extends('backend.layouts.app') @section('content')
<link rel="stylesheet" href="{{ asset('public/backend') }}/css/radio.css">
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
                    <li class="breadcrumb-item active">Edit</li>
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
                        <h3 class="card-title"><strong>Video Edit</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="frm-video-edit" class="form-horizontal" role="form" method="post" action="{{route('backend.videos.edit',$video->id)}}" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="url" class="col-sm-2 col-form-label">Video <span class="red">※</span></label>
                                <div class="col-sm-10">
                                        <div class="radio radio-info">
                                          <label>
                                            <input type="radio" name="type_video" class="type" id="type_embed" value="1" @if($video->type_video == 1) checked @endif >
                                            Embed Video (Youtube)
                                          </label>
                                        </div>
                                        <div class="radio radio-info">
                                          <label>
                                            <input type="radio" name="type_video" class="type" id="type_file" value="2" @if($video->type_video == 2) checked @endif>
                                            Upload movie file (.mp4)
                                          </label>
                                        </div>
                                        <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Embed Video</legend>
                                    <div class="control-group">
                                    <label class="control-label input-label" for="embed_video">Embed Video:</label>
                                    <textarea class="form-control input-width" id="embed_video" name="embed_video" placeholder="Embed Video">{{$video->embed_video}}</textarea>                
                                </div>
                            </fieldset>
                                <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Upload Movie File</legend>
                                 <div class="control-group">
                                    <label class="control-label input-label" for="embed_video">Video Upload (.mp4):</label>
                                    <input type="file" multiple="multiple" id="upload_file" name="video_file" class="form-control">
                                </div>

                            </fieldset>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title_en" class="col-sm-2 col-form-label">Title(En) <span class="red">※</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Video Title (English)" value="{{$video->title_en}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title_vi" class="col-sm-2 col-form-label">Title(Vi) <span class="red">※</span></label>
                                <div class="col-sm-10">
                        <input type="text" class="form-control" name="title_vi" id="title_vi" placeholder="Video Title (Vietnam)" value="{{$video->title_vi}}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="sort" class="col-sm-2 col-form-label">Sort</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control width-sort txt-center" id="sort" name="sort" value="{{ $video->sort }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sort" class="col-sm-2 col-form-label">SEO</label>
                                <div class="col-sm-10">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">SEO Parameters</legend>
                                        <div class="control-group">
                                            <label class="control-label input-label" for="seo_title">SEO Title: </label>
                                            <input type="text" class="control-label input-width" id="seo_title" name="seo_title" placeholder="SEO Title" />
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label input-label" for="seo_url">SEO URL: </label>
                                            <input type="text" class="control-label input-width" id="seo_url" name="seo_url" placeholder="SEO Url" />
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label input-label" for="seo_keyword">SEO Keyword: </label>
                                            <input type="text" class="control-label input-width" id="seo_keyword" name="seo_keyword" placeholder="SEO Keyword" />
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label input-label" for="seo_description">SEO Description:</label>
                                            <textarea class="control-label input-width" id="seo_description" name="seo_description" placeholder="SEO Description"></textarea>                
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sort" class="col-sm-2 col-form-label">Top Page</label>
                                <div class="custom-control custom-checkbox">
                                	<input class="custom-control-input" name="top_page" type="checkbox" id="top_page" value="1" @if($video->top_page == 1) checked @endif >
                                    <label for="top_page" class="custom-control-label"><span class="success">Display</span> (Video Top Page)</label>
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
                                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Update</button>
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
<script>
  $( document ).ready(function() {
    if (!$("#type_embed").prop("checked")) {
        $('#url').attr('disabled','disabled');
       $('#embed_video').attr('disabled','disabled');
    }else{
       $('#url').removeAttr('disabled');
       $('#embed_video').removeAttr('disabled');
    }
    if (!$("#type_file").prop("checked")) {
       $("#upload_file").attr('disabled','disabled');
       $('.btn-radius-right').addClass('disabled');
    }else{
       $('#upload_file').removeAttr('disabled');
       $('.btn-radius-right').removeClass('disabled');
    }
  }); 

  $('#type_embed').click(function() {
    $('#url').removeAttr('disabled');
    $('#embed_video').removeAttr('disabled');
    $("#upload_file").attr('disabled','disabled');
    $('.btn-radius-right').addClass('disabled');
  });

  $('#type_file').click(function() {
    $('#upload_file').removeAttr('disabled');
    $("#url").attr('disabled','disabled');
    $("#embed_video").attr('disabled','disabled');
    $('.btn-radius-right').removeClass('disabled');
  });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
    jQuery.validator.addMethod(
    "validate_file_type",
        function (value, element) {
            var files    =   $('#'+element.id)[0].files;            
            var fname = files[0].name.toLowerCase();
            var re = /(\.mp4|\.mov|\.ogg|\.qt)$/i;
            if(!re.exec(fname))
            {
                return false;
            }
            
            return true;

        }, "{{trans('validation.error_image_more_extension')}}"
    );
    if ($("#frm-video-edit").length > 0) {
        $("#frm-video-edit").validate({
            rules: {
                video_file: {                    
                    validate_file_type: true
                },
                type: {
                    required: true
                },
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
                video_file: {
                    required: "{{trans('validation.error_video_file_required')}}",
                    extension: "{{trans('validation.error_video_file_extension')}}"
                },
                type: {
                    required: "{{trans('validation.error_video_type_required')}}",
                },
                title_en: {
                    required: "{{trans('validation.error_video_name_en_required')}}",
                },
                title_vi: {
                    required: "{{trans('validation.error_video_name_vi_required')}}",
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
<script type="text/javascript" src="{{ asset('public/backend') }}/plugins/bootstrap-filestyle/js/bootstrap-filestyle.js"></script>
<script>
    $('#upload_file').filestyle({
        buttonText : 'Choose file',
        buttonName : 'btn-primary btn-radius-right'
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