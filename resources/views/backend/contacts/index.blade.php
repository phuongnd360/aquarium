@extends('backend.layouts.app')
@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contacts Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <i class="fa fa-home"></i>
                <a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contacts</li>
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
              <h3 class="card-title"><strong>Contacts List</strong></h3>
            </div>
            <!-- /.card-header -->
            <div class="table-responsive card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="txt-center">Read</th>
                  <th>Name</th>    
                  <th>E-mail</th>
                  <th class="txt-center">Phone</th>
                  <th class="txt-center">Massage</th>
                  <th class="txt-center">Date</th>
                  <th class="txt-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                  @if(!empty($contacts))
                  @foreach($contacts as $contact)
                    <tr @if(!empty($contact->flag_read)) class="read" @else class="unread" @endif>
                      <td class="txt-center vertical-middle">
                      	@if(!empty($contact->flag_read))
                      	<i class="fas fa-envelope-open-text" title="Read"></i>
                      	@else
                      	<i class="fa fa-envelope orange" title="Unread"></i>
                      	@endif
                      </td>
                      <td class="vertical-middle">
                        <a class="subject" href="{{route('backend.contacts.show',$contact->id)}}">
                        {{$contact->name}} </a>                      
                      </td>
                      <td class="vertical-middle">
                        <a href="mailto:{{$contact->email}}">{{$contact->email}}</a>
                      </td>
                      <td class="txt-center vertical-middle">
                        <a href="tel:{{$contact->phone}}">{{$contact->phone}}</a>
                      </td>
                      <td class="vertical-middle">{!! split_words($contact->content, 50, '...') !!}</td>                   
                      <td class="txt-center vertical-middle">{{$contact->created_at}}</td>
	                  <td class="text-right py-0 align-middle txt-center">
	                      <div class="btn-group btn-group-sm">
	                        <a href="{{route('backend.contacts.show',$contact->id)}}" title="View" class="btn btn-info" googl="true"><i class="fas fa-eye"></i></a>
	                        <a href="{{route('backend.contacts.delete',$contact->id)}}" title="Delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
	//$("#example1").DataTable();
	$('#example2').DataTable({
		"order": [ 7, "desc"],
    "responsive": true,
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

    if("{!! Session::get('danger_delete') !!}" != ""){
      toastr.error("{!! Session::get('danger_delete') !!}")
    }
    if("{!! Session::get('success_delete') !!}" != ""){
      toastr.success("{!! Session::get('success_delete') !!}")
    }

  });
</script>

@endsection
