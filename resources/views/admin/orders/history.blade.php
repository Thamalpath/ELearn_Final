<x-app-layout>
    @section('content')
        <div class="card card-primary m-3">
            <div class="card-header">
                <h3 class="card-title">Order History</h3>
                <a href="{{ url('orders') }}" class="btn btn-warning float-right" style="width: 150px">New Orders</a>
            </div>
            <div class="m-3">
                <table id="orders" class="table table-bordered table-striped dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th>Order Date</th>
                            <th>Tracking No</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                            <tr>
                                <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                <td>{{ $item->tracking_no }}</td>
                                <td>{{ $item->total }}</td>
                                <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                                <td>
                                    <a href="{{ route('orders.view', $item->id) }}" class="btn btn-success">View</a>
                                </td>
                        @endforeach
                    <tbody>
                </table>
            </div>
        </div>
    @endsection
</x-app-layout>
