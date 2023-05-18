@extends('layouts.app')

@section('content')
    <h1>Order Details</h1>
    <h4 class="text-center"><strong>Grand Total: </strong>${{ $cart->total }}</h4>

    <div class="text-center mb-3">
        <form class="d-inline" method="POST" action="{{ route('orders.store') }}">
            @csrf
            <button type="submit" class="btn btn-success">Confirm Order</button>
        </form>    
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->products as $key => $product)
                    <tr class="">
                        <td scope="row">
                            <img src="{{ asset($product->images->first()->path) }}" class="img-fluid rounded-top"
                                alt="" width="100">
                            {{ $product->title }}
                        </td>
                        <td scope="row">${{ $product->price }}</td>
                        <td scope="row">{{ $product->pivot->quantity }}</td>
                        <td scope="row">
                            <strong>
                                ${{ $product->total }}
                            </strong>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
