@extends('backend.layouts.app')
@section('content')
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
              <li class="breadcrumb-item active">Categories</li>
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
              <h3 class="card-title"><strong>Categories List</strong></h3>
              <div class="btn-right">              
                <button class="btn btn-sm btn-primary" type="button" onclick="location.href='{{route('backend.categories.create')}}'">
                  <i class="fa fa-plus"></i> Add</button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="table-responsive card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="txt-center">ID</th>
                  <th>Name(En)</th>
                  <th>Name(Vi)</th>
                  <th class="txt-center">Status</th>
                  <th class="txt-center">Sort</th>
                  <th class="txt-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                  @if(!empty($categories))
                  @foreach($categories as $category)
                    <tr>
                      <td class="txt-center">{{$category->id}}</td>
                      <td>{{$category->name_en}}</td>
                      <td>{{$category->name_vi}}</td>
                      <td class="text-right py-0 align-middle txt-center">
                      	@if(!empty($category->status))
                      	<i class="fa fa-times danger" aria-hidden="true"></i>
                      	@else
                      	<i class="fa fa-check success" aria-hidden="true"></i>
                      	@endif
                      </td>
                      <td class="text-right py-0 align-middle txt-center">
	                      <div class="btn-group btn-group-sm">
	                        <button type="button" id="{{$category->id}}" class="btn btn-default BTN_SORT" action="UP" sort="{{$category->sort}}"><i class="fas fa-long-arrow-alt-up success"></i></button>
                          <input type="text" class="sort txt-center" width="2" name="sort" value="{{$category->sort}}">
                          <button type="button" id="{{$category->id}}" class="btn btn-default BTN_SORT" action="DOWN" sort="{{$category->sort}}" ><i class="fas fa-long-arrow-alt-down orange"></i></button>
	                      </div>
	                  </td>

	                  <td class="text-right py-0 align-middle txt-center">
	                      <div class="btn-group btn-group-sm">
	                        <a href="{{route('backend.categories.show',$category->id)}}" class="btn btn-primary" googl="true"><i class="fas fa-eye"></i></a>
	                        <a href="{{route('backend.categories.edit',$category->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
	                        <a href="{{route('backend.categories.delete',$category->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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

  <script>
  $('.BTN_SORT').click(function(){
    var id = $(this).attr('id');
    var action = $(this).attr('action');
    var sort = $(this).attr('sort');

    $.ajax({
          type: "GET",
          url: "{{route('backend.categories.sort_ajax')}}",
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
