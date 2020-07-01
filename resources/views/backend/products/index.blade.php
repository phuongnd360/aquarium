@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Products Management</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <i class="fa fa-home"></i>
              <a href="{{route('backend.dashboard.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content" id="content">
    <div class="row">
    <div class="col-12">
      <div class="card">            
        <div class="card-header">
          <div class="cat-left">
            <label class="lbl-cat">Category: </label>
            <select name="cat_id" id="cat" class="form-control txt-center">
              <option value="">----- All -----</option>
              @if(!empty($categories))
              @foreach($categories as $key => $category)
              <option value="{{$key}}">{{$category}}</option>
              @endforeach
              @endif
            </select>
          </div>

          <div class="btn-right">
            <button class="btn btn-sm btn-primary" type="button" onclick="location.href='{{route('backend.products.create')}}'">
              <i class="fa fa-plus"></i> Add</button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="table-responsive card-body" id="table-refesh">
          @include('backend.products.content')
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
  $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
</script>
<script>
  $(function() {
  $('#example2').DataTable({
    "responsive": true,
    "order": [ 4, "asc" ],
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

<script>
  $('#cat').change(function(){
  var cat_id = $(this).val();    
  if(cat_id == "" || cat_id == null){ location.href = "{{route('backend.products.index')}}"; }
  else{ location.href = "{{route('backend.products.index')}}"+"?cat="+cat_id; }
  });
  $('#cat').find('option').each(function(i,e){ if($(e).val() == "{{$cat}}"){ $('#cat').prop('selectedIndex',i); }});
</script>

<script>
$('.BTN_SORT').click(function(){
  var id = $(this).attr('id');
  var action = $(this).attr('action');
  var sort = $(this).attr('sort');
  var cat = "{{$cat}}";

  $.ajax({
        type: "GET",
        url: "{{route('backend.products.sort_ajax')}}",
        data: {id: id, action: action, sort: sort, cat: cat},
        dataType: 'json',
        success: function (response) {
          if(response.result == 'OK'){  window.location.href=window.location.href; }
        },
        error: function (response) { console.log('Error:', response); }
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
