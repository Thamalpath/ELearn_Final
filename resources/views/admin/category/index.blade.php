<x-app-layout>
    @section('content')
        <div class="m-3">
            <table id="categories" class="table table-bordered table-striped dataTable dtr-inline" >
                <thead>
                    <tr>
                        <th>Cat_ID</th>
                        <th>Cat_Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Popular</th>
                        <th>Meta Title</th>
                        <th>Meta Description</th>
                        <th>Meta Keywords</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->number}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>{{$category->description}}</td>
                            <td>{{$category->status}}</td>
                            <td>{{$category->popular}}</td>
                            <td>{{$category->meta_title}}</td>
                            <td>{{$category->meta_description}}</td>
                            <td>{{$category->meta_keywords}}</td>
                            <td>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a> 
                                
                                 <button type="button" class="btn btn-danger delete-btn"  data-category_id={{$category->id}} data-bs-toggle="modal" data-bs-target="#deletecategoryModal">
                                    Delete
                                </button> 
                            </td>
                    @endforeach
                <tbody>
            </table>
        </div>
        
<!-- Modal -->
<div class="modal fade" id="deletecategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deletecategoryModal">Delete category</h1>
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
            let table = new DataTable('#categories');
            $('.delete-btn').on('click', function(){
                let category_id = $(this).data('category_id');
                $('#deleteForm').attr('action', '/dashboard/category/'+category_id+'/delete');
            })
        </script>
    @endsection
</x-app-layout>
