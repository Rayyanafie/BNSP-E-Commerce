@extends('layout.app')

@section('header')
<h1 class="text-center">Your Cart</h1>
@endsection

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function () {
                window.location.href = "{{ route('user.index') }}";
            }, 3000); // 3000 milliseconds = 3 seconds
        </script>
    @endif

    @if($cartItems->isEmpty())
        <p>Your cart is empty.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->product->price, 2) }}</td>
                        <td>${{ number_format($item->quantity * $item->product->price, 2) }}</td>
                        <td>
                            <!-- Delete Button -->
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" align="right"><strong>Total Amount:</strong></td>
                    <td colspan="2">
                        ${{ number_format($cartItems->sum(fn($item) => $item->quantity * $item->product->price), 2) }}</td>
                </tr>
            </tfoot>
        </table>

        <!-- Checkout Button -->
        <form id="checkoutForm" action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <button type="button" class="btn btn-primary" onclick="handleCheckout()">Checkout</button>
        </form>
    @endif

    <!-- Return to Products Button -->
    <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3">Return to Products</a>
</div>
@endsection

<script>
    function handleCheckout() {
        // Submit the checkout form
        document.getElementById('checkoutForm').submit();

        // Send an email after the form submission
        fetch('{{ route('email.send') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({})
        }).then(response => {
            if (response.ok) {
                console.log('Email sent successfully');
            } else {
                console.error('Failed to send email');
            }
        }).catch(error => {
            console.error('Error:', error);
        });
    }
</script>