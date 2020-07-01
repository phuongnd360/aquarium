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
              <li class="breadcrumb-item active">Edit</li>
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
                <h3 class="card-title"><strong>User Edit</strong></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="frm-user-edit" class="form-horizontal" role="form" method="post" action="{{route('backend.users.edit',$user->id)}}" accept-charset="utf-8" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">
                	<div class="form-group row">
                    	<label for="first_name" class="col-sm-2 col-form-label">First Name <span class="red">※</span></label>
                    	<div class="col-sm-10">
	                      <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{$user->first_name}}">
	                    </div>
                  	</div>
                  	<div class="form-group row">
                    	<label for="last_name" class="col-sm-2 col-form-label">Last Name <span class="red">※</span></label>
                    	<div class="col-sm-10">
	                      <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{$user->last_name}}">
	                    </div>
                  	</div>
                  <div class="form-group row">
	                    <label for="username" class="col-sm-2 col-form-label">Username <span class="red">※</span></label>
	                    <div class="col-sm-10">
	                      <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{$user->username}}">
                    	</div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email <span class="red">※</span></label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{$user->email}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="password_conf" class="col-sm-2 col-form-label">Password Confirm</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password_conf" id="password_conf" placeholder="Password Confirm" autocomplete="off" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="roles" class="col-sm-2 col-form-label">Roles</label>
                    <div class="col-sm-10">
      						<select name="roles" class="form-control select2" style="width: 30%;">
                    @if(count(Roles()) > 0)
                      @foreach(Roles() as $key => $role)
                        <option value="{{$key}}" @if($user->roles == $key) selected @endif >{{$role}}</option>
                      @endforeach
                    @endif
      						</select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                      <select name="status" class="form-control" style="width: 30%;">
							<option value="1" class="green" @if($user->status == 1) selected @endif >Active</option>
							<option value="2" class="red" @if($user->status == 2) selected @endif >Inactive</option>
						</select>
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
      </div><!-- /.container-fluid -->
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        if ($("#frm-user-edit").length > 0) {
            $("#frm-user-edit").validate({
                rules: {
                    first_name: {
                        required: true
                    },
                    last_name: {
                        required: true
                    },
                    username: {
                        required: true,
                        remote: {
		                    url:"{{route('backend.users.chkUserEdit',['id'=>$user->id])}}",
		                    type:"get"
		               }
                    },
                    email: {
                        required: true,
                        email: true,
                        remote: {
		                    url:"{{route('backend.users.chkUserEdit',['id'=>$user->id])}}",
		                    type:"get"
		               }
                    },
                    password: {
                        minlength: 6
                    },
                    password_conf: {
                        minlength: 6,
                        equalTo : "#password"
                    },
                },
                messages: {
                	first_name: {
                        required: "{{trans('validation.error_first_name_required')}}",
                    },
                    last_name: {
                        required: "{{trans('validation.error_last_name_required')}}",
                    },
                    username: {
                        required: "{{trans('validation.error_username_required')}}",
                        remote: "{{trans('validation.error_username_existed')}}"
                    },
                    email: {
                        required: "{{trans('validation.error_email_required')}}",
                        email: "{{trans('validation.error_email_email')}}",
                        remote: "{{trans('validation.error_email_existed')}}"
                    },
                    password: {
                        minlength: "{{trans('validation.error_password_minlength')}}",
                    },
                    password_conf: {
                        minlength: "{{trans('validation.error_password_conf_minlength')}}",
                        equalTo: "{{trans('validation.error_password_conf_equalTo')}}"
                    },
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

    if("{!! Session::get('danger_edit') !!}" != ""){
      toastr.error("{!! Session::get('danger_edit') !!}")
    }
    if("{!! Session::get('success_edit') !!}" != ""){
      toastr.success("{!! Session::get('success_edit') !!}")
    }
  });
</script>

@endsection
