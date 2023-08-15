<x-app-layout>
    @section('content')
        <div class="m-3">
            <table id="sub_categories" class="table table-bordered table-striped">
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
                </tbody>
            </table>
        </div>
    @endsection
    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css">
    @endpush
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>
        <script>
            $(document).ready(function() {
                var dataTable = $('#sub_categories').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "lengthMenu": [
                        [5, 10, 25, 50, -1],
                        [5, 10, 25, 50, "All"]
                    ],
                    "ajax": {
                        "url": "{{ route('sub_category.subCategoriesTable') }}",
                        "method": "GET",
                    },
                    "initComplete": function() {
                        this.api().columns().every(function() {
                            var column = this;
                            var input = document.createElement("input");
                            $(input).appendTo($(column.footer()).empty())
                                .on('keyup change', function() {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                        });
                    }
                });

                $(document).on('click', '.delete-btn', function() {
                    let id = $(this).data('id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ url('sub_category') }}/" + id + '/delete',
                                method: 'DELETE',
                                data: {
                                    _token: "{{ csrf_token() }}"
                                },
                                success: function(response) {
                                    Swal.fire(
                                        'Deleted!',
                                        response.message,
                                        'success'
                                    )
                                    dataTable.draw();
                                },
                                error: function(response) {
                                    console.log(response);
                                }
                            })
                        }
                    })
                });
            });
        </script>
    @endpush
</x-app-layout>
