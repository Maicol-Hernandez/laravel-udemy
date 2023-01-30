@extends('layouts.app')

@section('content')
    <h1>Welcome</h1>
    @empty($products)
        <div class="alert alert-danger" role="alert">
            <span>No products yet!</span>
        </div>
    @endempty
    <div class="row justify-content-center align-items-center g-2">
        @foreach ($products as $product)
            <div class="col-3">
              @include('components.product-card')
            </div>
        @endforeach

    </div>
@endsection
