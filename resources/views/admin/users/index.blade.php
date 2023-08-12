<x-app-layout>
    @section('content')
        <div class="card card-primary m-3">
            <div class="card-header">
                <h3 class="card-title">Registered Users</h3>
            </div>
            <div class="m-3">
                <table id="users" class="table table-bordered table-striped dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->fname . ' ' . $item->lname }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>
                                    <a href="{{ route('users.view', $item->id) }}" class="btn btn-success">View</a>
                                </td>
                        @endforeach
                    <tbody>
                </table>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script>
            let table = new DataTable('#users');
        </script>
    @endsection
</x-app-layout>
