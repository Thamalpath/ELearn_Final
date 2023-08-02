<x-app-layout>
    @section('content')
        <div class="card card-primary m-3">
            <div class="card-header">
                <h3 class="card-title">Order View</h3>
                <a href="{{ url('orders') }}" class="btn btn-warning float-right">Back</a>
            </div>
            <div class="m-3">
                <table id="orders" class="table table-bordered table-striped dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Qty</th>
                            <th>Image</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Shipping Address</th>
                            <th>Zip Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders->orderItems as $index => $item)
                            <tr>
                                <td style="width: 20%">{{ $item->products->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td><img src="{{ asset('storage/' . json_decode($item->products->images)[0]) }}"
                                        width="60px" height="auto" alt="Product Image"></td>
                                @if ($index === 0)
                                    <td rowspan="{{ count($orders->orderItems) }}" style="text-transform: none;">
                                        {{ $orders->email }}</td>
                                    <td rowspan="{{ count($orders->orderItems) }}">
                                        {{ $orders->phone }}</td>
                                    <td rowspan="{{ count($orders->orderItems) }}" style="width: 15%">
                                        {{ $orders->address1 }},
                                        {{ $orders->address2 }},
                                        {{ $orders->city }},
                                        {{ $orders->state }},
                                        {{ $orders->country }}
                                    </td>
                                    <td rowspan="{{ count($orders->orderItems) }}">
                                        {{ $orders->zipcode }}</td>
                                @endif
                                <form action="{{ route('orders.update', $orders->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @if ($index === 0)
                                        <td rowspan="{{ count($orders->orderItems) }}">
                                            <div class="form-group">
                                                <select class="form-control" name="status">
                                                    <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">
                                                        Pending</option>
                                                    <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">
                                                        Completed</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td rowspan="{{ count($orders->orderItems) }}"><button type="submit"
                                                class="btn btn-primary">Update</button></td>
                                    @endif
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
</x-app-layout>
