@extends('backend.layouts.app') @section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Gallery List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home"></i>
                        <a href="{{route('backend.dashboard.index')}}">Home</a></li>
                    <li class="breadcrumb-item active">Gallery</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content admin-gallery">
    @if(count($gallery) > 0)
    <div class="row">
        <div class="col-12">
            <div class="redman-gallery" data-redman-totalCount="17" data-redman-countPerPage="12" data-redman-countPerRow="4" data-redman-startHeight="250" data-redman-theme="dark">
                @foreach($gallery as $key => $product)
                    <img src="{{asset('storage/uploads/products/thumbs')}}/{{$product->image_primary}}" alt="{{$product->name_en}}"> 
                    @if(!empty($product->image_more))
                        <?php $image_more = json_decode($product->image_more); ?>
                        @foreach($image_more as $imgmore)
                            <img src="{{asset('storage/uploads/products/thumbs')}}/{{$imgmore}}" alt="{{$product->name_en}}"> 
                        @endforeach 
                    @endif 
                @endforeach                 
            </div>
        </div>
    </div>
@endif
    <script src="{{ asset('public/backend') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="{{ asset('public/backend') }}/plugins/jquerysctipttop/js/popper.min.js"></script>
    <script src="{{ asset('public/backend') }}/plugins/photo-gallery-redman/js/redman-photoGallery.min.js">        
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

            if ("{!! Session::get('danger_edit') !!}" != "") {
                toastr.error("{!! Session::get('danger_edit') !!}")
            }
            if ("{!! Session::get('success_edit') !!}" != "") {
                toastr.success("{!! Session::get('success_edit') !!}")
            }

            if ("{!! Session::get('danger_delete') !!}" != "") {
                toastr.error("{!! Session::get('danger_delete') !!}")
            }
            if ("{!! Session::get('success_delete') !!}" != "") {
                toastr.success("{!! Session::get('success_delete') !!}")
            }

        });
    </script>

    @endsection