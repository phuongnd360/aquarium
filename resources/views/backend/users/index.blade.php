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
              <li class="breadcrumb-item active">Users</li>
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
              <h3 class="card-title"><strong>Users List</strong></h3>
              <div class="btn-right">              
                <button class="btn btn-sm btn-primary" type="button" onclick="location.href='{{route('backend.users.add')}}'">
                  <i class="fa fa-plus"></i> Add</button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="table-responsive card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Username</th>
                  <th>E-mail</th>
                  <th class="txt-center">Status</th>
                  <th class="txt-center">Roles</th>
                  <th class="txt-center">Actions</th>
                </tr>
                </thead>
                <tbody>

                  @if(!empty($users))
                  @foreach($users as $user)
                    <tr>
                      <td>{{$user->first_name}} {{$user->last_name}}</td>
                      <td>{{$user->username}}</td>
                      <td>{{$user->email}}</td>
                      <td class="text-right py-0 align-middle txt-center">
                        @if(!empty($user->status))
                        <a href="#" class="btn btn-success disable" googl="true">Active</a>
                        @else
                        <a href="#" class="btn btn-danger disable" googl="true">Inactive</a>
                        @endif
                      </td>
                      <td class="txt-center">{{@Roles()[$user->roles]}}</td>
                      <td class="text-right py-0 align-middle txt-center">
                        <div class="btn-group btn-group-sm">
                          <a href="{{route('backend.users.detail',$user->id)}}" class="btn btn-primary" googl="true"><i class="fas fa-eye"></i></a>
                          <a href="{{route('backend.users.edit',$user->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                          <a href="{{route('backend.users.delete',$user->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
    $(function() {
        $('#example2').DataTable({
            "scrollX": false,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
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
