@extends('emails.layouts.email')
@section('content')
    <p>Dear {{ $order->fname }}</p>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero quasi possimus eveniet ex nemo magni ad, non
        cupiditate dicta quisquam perspiciatis! Reiciendis nulla corporis magnam voluptates sit reprehenderit id soluta?</p>

    <table style="width: 60%; margin: auto">
        <tbody style="width: 100%">
            @foreach ($order->orderItems as $item)
                <tr style="width: 100%">
                    <td style="width: auto">{{ $item->name }}</td>
                    <td style="width: auto">{{ $item->qty }}</td>
                    <td style="text-align: right"><b>{{ $item->sub_total }}</b></td>
                </tr>
            @endforeach
            <tr>
                <td style="text-align: right; width: auto">Total</td>
                <td style="text-align: right"><b>{{ $order->total }}</b></td>
            </tr>
        </tbody>
    </table>
@endsection
