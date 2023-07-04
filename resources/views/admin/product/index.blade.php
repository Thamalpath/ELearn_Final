<x-app-layout>
    @section('content')
        <div class="m-3">
            <table id="products" class="table table-bordered table-responsive table-striped dataTable dtr-inline" >
                <thead>
                    <tr>
                        <th>Product_ID</th>
                        <th>Cat_Name</th>
                        <th>Sub_Cat_Name</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Original Price</th>
                        <th>Selling Price</th>
                        <th>Tax</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Material</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Status</th>
                        <th>Trending</th>
                        <th>Popular</th>
                        <th>Meta Title</th>
                        <th>Meta Description</th>
                        <th>Meta Keywords</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->number}}</td>
                            <td>{{$product->category_name}}</td>
                            <td>{{$product->sub_category_name}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->original_price}}</td>
                            <td>{{$product->selling_price}}</td>
                            <td>{{$product->tax}}</td>
                            <td>
                                <img src="{{ asset('storage/'.$product->image) }}" alt="Image" height="125px" width="90px">
                            </td>
                            <td>{{$product->qty}}</td>
                            <td>{{$product->material}}</td>
                            <td>{{$product->size}}</td>
                            <td>{{$product->color}}</td>
                            <td>{{$product->status}}</td>
                            <td>{{$product->trending}}</td>
                            <td>{{$product->popular}}</td>
                            <td>{{$product->meta_title}}</td>
                            <td>{{$product->meta_description}}</td>
                            <td>{{$product->meta_keywords}}</td>
                            <td>
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a> 
                                
                                 <button type="button" class="btn btn-danger delete-btn"  data-product_id={{$product->id}} data-bs-toggle="modal" data-bs-target="#deleteproductModal">
                                    Delete
                                </button> 
                            </td>
                    @endforeach
                <tbody>
            </table>
        </div>
        
<!-- Modal -->
<div class="modal fade" id="deleteproductModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteproductModal">Delete Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" id="deleteForm">
            @csrf
            @method('DELETE')
        <div class="modal-body">
            Are you sure?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div>

    @endsection
    @section('scripts')
        <script>
            let table = new DataTable('#products');
            $('.delete-btn').on('click', function(){
                let product_id = $(this).data('product_id');
                $('#deleteForm').attr('action', '/dashboard/product/'+product_id+'/delete');
            })
        </script>
    @endsection
</x-app-layout>
