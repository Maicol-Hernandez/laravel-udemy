@extends('layouts.app')

@section('content')
    <h1>Order Details</h1>
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
                        <td scope="row">{{ $product->price }}</td>
                        <td scope="row">{{ $product->pivot->quantity }}</td>
                        <td scope="row">{{ $product->stock }}</td>
                        <td scope="row">
                            <strong>
                                {{ $product->pivot->quantity * $product->price }}
                            </strong>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
