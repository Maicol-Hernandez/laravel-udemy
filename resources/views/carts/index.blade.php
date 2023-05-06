@extends('layouts.app')

@section('content')
    <h1>Your Cart</h1>
    @if (!isset($cart) || $cart->products->isEmpty())
        <div class="alert alert-warning" role="alert">
            <span>Your cart is empty!</span>
        </div>
    @else
        <h4 class="text-center">Your cart Total <strong>{{ $cart->total }}</strong></h4>
        <a class="btn btn-success mb-3" href="{{ route('orders.create') }}" role="button">
            Start Order
        </a>
        <div class="row justify-start-center align-items-center g-2">
            @foreach ($cart->products as $product)
                <div class="col-3">
                    @include('components.product-card')
                </div>
            @endforeach
        </div>
    @endif
@endsection
