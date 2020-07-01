@extends('backend.layouts.app')
@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <i class="fa fa-home"></i>
                <a href="{{route('backend.dashboard.index')}}">Home</a></li>
                <li class="breadcrumb-item">
                <a href="{{route('backend.users.index')}}">Users</a></li>
              <li class="breadcrumb-item active">Delete</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
              <form id="frm-user-edit" class="form-horizontal" role="form" method="post" action="{{route('backend.users.delete',$user->id)}}" accept-charset="utf-8" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">
                	<div class="form-group row">
                    	<label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                    	<div class="col-sm-10">
	                      {{$user->first_name}}
	                    </div>
                  	</div>
                  	<div class="form-group row">
                    	<label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                    	<div class="col-sm-10">
	                      {{$user->last_name}}
	                    </div>
                  	</div>
                  <div class="form-group row">
	                    <label for="username" class="col-sm-2 col-form-label">Username</label>
	                    <div class="col-sm-10">
	                      {{$user->username}}
                    	</div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      {{$user->email}}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="roles" class="col-sm-2 col-form-label">Roles</label>
                    <div class="col-sm-10">
						        {{@Roles()[$user->roles]}}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                      @if(!empty($user->status))
                        <!-- <a class="btn btn-danger btn-sm white width-status" googl="true">Not Display</a> -->
                        <a href="#" class="btn btn-success" googl="true">Active</a>
                        @else
                        <!-- <a class="btn btn-success btn-sm white width-status" googl="true">Display</a> -->
                        <a href="#" class="btn btn-danger" googl="true">Inactive</a>
                        @endif
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                	<div class="offset-sm-2">                		
                  		<button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
                      <button type="button" class="btn btn-default" onclick="location.href='{{route('backend.users.index')}}'"><i class="fa fa-reply-all"></i> Back Users List</button>
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
      </div><!-- /.container-fluid -->
    </section>
  <script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    if("{!! Session::get('danger_delete') !!}" != ""){
      toastr.error("{!! Session::get('danger_delete') !!}")
    }
    if("{!! Session::get('success_delete') !!}" != ""){
      toastr.success("{!! Session::get('success_delete') !!}")
    }
  });
</script>

@endsection
