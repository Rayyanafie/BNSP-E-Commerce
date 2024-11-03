<!DOCTYPE html>
<html>

<head>
    <title>Payment Receipt</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {}

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div style="width: 100%; padding: 20px; box-sizing: border-box;">
        <h1 style="text-align: center;">Toko Alat Kesehatan</h1>
        <h2 style="margin-top: 20px;"></h2>
        <table style="width: 100%;margin-bottom: 20px;">
            <tr>
                <td style="padding: 10px; ;">
                    <p><strong>Username:</strong> {{ $user->username }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Address:</strong> {{ $user->address }}</p>
                    <p><strong>City:</strong> {{ $user->city }}</p>
                    <p><strong>Phone:</strong> {{ $user->phone }}</p>
                </td>
                <td style="padding: 10px; ;">
                    @if($orders->isNotEmpty())
                        <p><strong>Date:</strong> {{ $orders->first()->created_at }}</p>
                    @else
                        <p><strong>Date:</strong> No orders available</p>
                    @endif
                    <p><strong>PayPal ID:</strong> {{ $user->paypal_id }}</p>
                    <p><strong>Bank Name :</strong> Chase</p>
                    <p><strong>Payment Method:</strong> Prepaid </p>
                </td>
            </tr>
        </table>

        @if($orders->isEmpty())
            <p>You have no orders.</p>
        @else
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border: 1px solid black; ">Product</th>
                        <th style="border: 1px solid black; ">Quantity</th>
                        <th style="border: 1px solid black; ">Price</th>
                        <th style="border: 1px solid black; ">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td style="border: 1px solid black; padding: 10px;">{{ $order->product->name }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $order->quantity }}</td>
                            <td style="border: 1px solid black; padding: 10px;">${{ number_format($order->price, 2) }}</td>
                            <td style="border: 1px solid black; padding: 10px;">${{ number_format($order->subtotal, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" style="; padding: 10px; text-align: right;"><strong>Total Amount:</strong></td>
                        <td style="padding: 10px;">
                            ${{ number_format($orders->sum('subtotal'), 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        @endif
    </div>
</body>

</html>