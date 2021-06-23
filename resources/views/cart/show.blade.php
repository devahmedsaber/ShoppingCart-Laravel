@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="row">
            @if($cart)
                <div class="col-md-8">
                    @foreach($cart->items as $product)
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $product['title'] }}
                                </h5>
                                <div class="card-text">
                                    $ {{ $product['price'] }}
                                    <input type="text" name="qty" id="qty" value="{{ $product['qty'] }}">
                                    <a href="#" class="btn btn-secondary btn-sm">Change</a>
                                    <form action="{{ route('products.delete', $product['id']) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm ml-4 float-right" style="margin-top: -28px;">Remove</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <p><strong>Total : $ {{ $cart->totalPrice }}</strong></p>
                </div>
                <div class="col-md-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h3 class="card-title">
                                Your Cart
                                <hr>
                            </h3>
                            <div class="card-text">
                                <p>
                                    Total Amount is $ {{ $cart->totalPrice }}
                                </p>
                                <p>
                                    Total Quantities is {{ $cart->totalQty }}
                                </p>
                                <a href="{{ route('cart.checkout', $cart->totalPrice) }}" class="btn btn-info">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <p>There are no items in the cart.</p>
            @endif
        </div>
    </div>
@endsection
