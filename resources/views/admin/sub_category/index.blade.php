<x-app-layout>
    @section('content')
        <div class="m-3">
            <table id="sub_categories" class="table table-bordered table-striped dataTable dtr-inline">
                <thead>
                    <tr>
                        <th>Sub_Cat_ID</th>
                        <th>Cat_Name</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Meta Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sub_categories as $sub_category)
                        <tr>
                            <td>{{ $sub_category->number }}</td>
                            <td>{{ $sub_category->category_name }}</td>
                            <td>{{ $sub_category->name }}</td>
                            <td>{{ $sub_category->description }}</td>
                            <td>{{ $sub_category->status }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $sub_category->image) }}" alt="Image" height="125px"
                                    width="90px">
                            </td>
                            <td>{{ $sub_category->meta_title }}</td>
                            <td>
                                <a href="{{ route('sub_category.edit', $sub_category->id) }}"
                                    class="btn btn-primary mr-2">Edit</a>

                                <button type="button" class="btn btn-danger delete-btn"
                                    data-sub_category_id={{ $sub_category->id }} data-bs-toggle="modal"
                                    data-bs-target="#deletesub_categoryModal">
                                    Delete
                                </button>
                            </td>
                    @endforeach
                <tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deletesub_categoryModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deletesub_categoryModal">Delete Sub Category</h1>
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
            let table = new DataTable('#sub_categories');
            $('.delete-btn').on('click', function() {
                let sub_category_id = $(this).data('sub_category_id');
                $('#deleteForm').attr('action', '/sub_category/' + sub_category_id + '/delete');
            });
        </script>
    @endsection
</x-app-layout>
