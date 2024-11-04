@extends('layout.app')

@section('content')
<div class="container">
    <h1>Your Orders</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        <script>
        </script>
    @endif

    <h2>User Information</h2>
    <table class="table">
        <tr>
            <td>
                <p><strong>Username:</strong> {{ $user->username }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Address:</strong> {{ $user->address }}</p>
                <p><strong>City:</strong> {{ $user->city }}</p>
                <p><strong>Phone:</strong> {{ $user->phone }}</p>
            </td>
            <td>
                <p><strong>Date:</strong> {{ $orders->first()->created_at }}</p>
                <p><strong>PayPal ID:</strong> {{ $user->paypal_id }}</p>
            </td>
        </tr>
    </table>

    @if($orders->isEmpty())
        <p>You have no orders.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>${{ number_format($order->price, 2) }}</td>
                        <td>${{ number_format($order->subtotal, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" align="right"><strong>Total Amount:</strong></td>
                    <td>${{ number_format($orders->sum('subtotal'), 2) }}</td>
                </tr>
            </tfoot>
        </table>
    @endif

    <div class="mt-3">
        @if($orders->isNotEmpty())
            <a href="{{ route('orders.downloadReceipt', $orders->first()->id) }}" class="btn btn-primary">Download
                Receipt</a>
        @else
            <a href="#" class="btn btn-primary disabled">Download Receipt</a>
        @endif
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Return to Dashboard</a>
    </div>
</div>
@endsection