@extends('backend.layouts.app')
@section('content')
<!-- GRT Youtube Plugin CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/video-popup/css/grt-youtube-popup.css"> -->
<style>
      .holder {
  width: 100px;
  height: 80px;
  position: relative;
}

.frame {
  width: 100%;
  height: 100%;
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100px;
  height: 80px;
  cursor: pointer;
}
    </style>
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
              <li class="breadcrumb-item active">Videos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><strong>Videos List</strong></h3>
              <div class="btn-right">              
                <button class="btn btn-sm btn-primary" type="button" onclick="location.href='{{route('backend.videos.create')}}'">
                  <i class="fa fa-plus"></i> Add</button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="table-responsive card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="txt-center">Video</th>
                  <th>Title</th>
                  <th class="txt-center">Status</th>
                  <th class="txt-center">Sort</th>
                  <th class="txt-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                  @if(!empty($videos))
                  @foreach($videos as $video)
                    <tr>
                      <td class="txt-center" width="30" height="20">
                        @if($video->type_video == 1)
                        <div class="holder">
                        <a href="#" data-target="#videoModal" data-toggle="modal" class="overlay trigger" src="{{$video->url}}">
                          <img class="list-img overlay trigger" src="{{asset('public/common/images/youtube-embed.png')}}">
                        </a>
                          </div>
                          <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                  <button type="button" class="close btn-round btn-primary modal-video-close-btn" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                <div class="embed-responsive embed-responsive-16by9">
                                  @if(!empty($video->embed_video))
                                  {!! $video->embed_video !!}                                  
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>

                        @elseif($video->type_video == 2)
                        <div class="holder">
                        <a href="#" data-target="#fileVideo" data-toggle="modal" class="overlay trigger" src="{{asset('storage/uploads/videos')}}/{{$video->url}}">
                          <img class="list-img overlay trigger" src="{{asset('public/common/images/movie-file.png')}}">
                        </a>

                        <div class="modal fade" id="fileVideo" tabindex="-1" role="dialog" aria-labelledby="fileVideo" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                  <button type="button" class="close btn-round btn-primary modal-video-close-btn" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                <div class="embed-responsive embed-responsive-16by9" style="width: 100%; height: auto; margin:0 auto; frameborder:0; margin-bottom: -31px;">

                                <video controls id="video1" style="width: 100%; height: auto; margin:0 auto; frameborder:0;" poster="{{asset('storage/uploads/videos')}}/{{$video->poster}}">
                                    <source src="{{asset('storage/uploads/videos')}}/{{$video->url}}" type="video/mp4">
                                      <track src="devstories-en.vtt" label="English subtitles" kind="subtitles" srclang="en" default></track>
                                </video>

                               </div>
                              </div>
                            </div>
                          </div>


                        @endif
                      </td>
                      <td>{{$video->title_en}}</td>
                      <td class="text-right py-0 align-middle txt-center">
                      	@if(!empty($video->status))
                      	<i class="fa fa-times danger" aria-hidden="true"></i>
                      	@else
                      	<i class="fa fa-check success" aria-hidden="true"></i>
                      	@endif
                      </td>
                      <td class="text-right py-0 align-middle txt-center">
	                      <div class="btn-group btn-group-sm">
	                        <button type="button" id="{{$video->id}}" class="btn btn-default BTN_SORT" action="UP" sort="{{$video->sort}}"><i class="fas fa-long-arrow-alt-up success"></i></button>
                          <input type="text" class="sort txt-center" width="2" name="sort" value="{{$video->sort}}">
                          <button type="button" id="{{$video->id}}" class="btn btn-default BTN_SORT" action="DOWN" sort="{{$video->sort}}" ><i class="fas fa-long-arrow-alt-down orange"></i></button>
	                      </div>
	                  </td>

	                  <td class="text-right py-0 align-middle txt-center">
	                      <div class="btn-group btn-group-sm">
	                        <a href="{{route('backend.videos.show',$video->id)}}" class="btn btn-primary" googl="true"><i class="fas fa-eye"></i></a>
	                        <a href="{{route('backend.videos.edit',$video->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
	                        <a href="{{route('backend.videos.delete',$video->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
	                      </div>
	                  </td>
                    </tr>
                  @endforeach
                  @endif                
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>




  <!-- GRT Youtube Popup -->
    <script src="{{ asset('public/backend') }}/plugins/video-popup/js/grt-youtube-popup.js"></script>

    <!-- Initialize GRT Youtube Popup plugin -->
  <script>
  $('.BTN_SORT').click(function(){
    var id = $(this).attr('id');
    var action = $(this).attr('action');
    var sort = $(this).attr('sort');

    $.ajax({
          type: "GET",
          url: "{{route('backend.videos.sort_ajax')}}",
          data: {id: id, action: action, sort: sort},
          dataType: 'json',
          success: function (response) {
              if(response.result == 'OK'){  window.location.href=window.location.href; }
          },
          error: function (response) { console.log('Error:', response); }
      });

  });
  
</script>

<script>
$(function() {
	//$("#example1").DataTable();
	$('#example2').DataTable({
		"order": [[ 4, "asc" ]],
		"scrollX": false,
		"paging": true,
		"lengthChange": true,
		"searching": true,
		//"ordering": true,
		"info": true,
		"autoWidth": false,
		});
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

    if("{!! Session::get('danger') !!}" != ""){
      toastr.error("{!! Session::get('danger') !!}")
    }
    if("{!! Session::get('success') !!}" != ""){
      toastr.success("{!! Session::get('success') !!}")
    }

    if("{!! Session::get('danger_edit') !!}" != ""){
      toastr.error("{!! Session::get('danger_edit') !!}")
    }
    if("{!! Session::get('success_edit') !!}" != ""){
      toastr.success("{!! Session::get('success_edit') !!}")
    }

    if("{!! Session::get('danger_delete') !!}" != ""){
      toastr.error("{!! Session::get('danger_delete') !!}")
    }
    if("{!! Session::get('success_delete') !!}" != ""){
      toastr.success("{!! Session::get('success_delete') !!}")
    }

  });
</script>

@endsection
