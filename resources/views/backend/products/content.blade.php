  <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th class="image_primary">Photo</th>
      <th>Name(En)</th>
      <!-- <th>Name(s)</th> -->
      <th>Category</th>
      <th>Size</th>
      <th class="txt-center">Status</th>
      <th class="txt-center">Sort</th>
      <th class="txt-center">Actions</th>
    </tr>
    </thead>
    <tbody>
      @if(!empty($products))
      @foreach($products as $product)
        <tr>
          <td class="txt-center vertical-middle">
            @if(!empty($product->image_primary))
            <a href="{{asset('storage/uploads/products/thumbs')}}/{{$product->image_primary}}" target="_blank">
            <img src="{{asset('storage/uploads/products/thumbs')}}/{{$product->image_primary}}" class="img-circle img-product" alt="{{$product->image_primary}}"></a>
            @else
            <img src="{{asset('public/backend/img/No-Image.png')}}" class="img-circle img-product" alt="{{$product->image_primary}}">
            @endif
          </td>
          <td class="vertical-middle">
            <a href="{{route('backend.products.show',$product->id)}}" class="txt-center vertical-middle">{{$product->name_en}}</a>
          </td>
          <td class="vertical-middle">{{$product->cat_name_en}}</td>
          <td class="txt-center vertical-middle">{{$product->size}}</td>
          <td class="text-right py-0 align-middle txt-center">
            @if(!empty($product->status))
            <i class="fa fa-times danger" aria-hidden="true"></i>
            @else
            <i class="fa fa-check success" aria-hidden="true"></i>
            @endif
          </td>
          <td class="text-right py-0 align-middle txt-center">
            <div class="btn-group btn-group-sm">
              <button type="button" id="{{$product->id}}" class="btn btn-default BTN_SORT" action="UP" sort="{{$product->sort}}"><i class="fas fa-long-arrow-alt-up success"></i></button>
              <input type="text" class="sort txt-center" width="2" name="sort" value="{{$product->sort}}">
              <button type="button" id="{{$product->id}}" class="btn btn-default BTN_SORT" action="DOWN" sort="{{$product->sort}}" ><i class="fas fa-long-arrow-alt-down orange"></i></button>
            </div>
        </td>

        <td class="text-right py-0 align-middle txt-center">
            <div class="btn-group btn-group-sm">
              <a href="{{route('backend.products.copy',$product->id)}}" title="Copy" class="btn btn-info" googl="true"><i class="fas fa-copy"></i></a>
              <a href="{{route('backend.products.show',$product->id)}}" title="View" class="btn btn-primary" googl="true"><i class="fas fa-eye"></i></a>
              <a href="{{route('backend.products.edit',$product->id)}}" title="Edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>
              <a href="{{route('backend.products.delete',$product->id)}}" title="Delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
            </div>
        </td>
        </tr>
      @endforeach
      @endif
    </tfoot>
  </table>
