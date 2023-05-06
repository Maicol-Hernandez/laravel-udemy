<div class="card">
    <img class="card-img-top" src="{{ asset($product->images->first()->path) }}" alt="" height="400">
    <div class="card-body">
        <h4 class="text-end">
            <strong>${{ $product->price }}</strong>
        </h4>
        <h5 class="card-title">
            {{ $product->price }}
        </h5>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text"><strong>{{ $product->stock }} left</strong></p>
    </div>
    <div class="card-footer text-muted">
        @isset($cart)
            <p class="card-text">{{ $product->pivot->quantity }} in your cart
                <strong>(${{ $product->total }})</strong>
            </p>
            <form class="d-inline" method="POST"
                action="{{ route('products.carts.destroy', ['cart' => $cart->id, 'product' => $product->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Remove From Cart</button>
            </form>
        @else
            <form class="d-inline" method="POST" action="{{ route('products.carts.store', ['product' => $product->id]) }}">
                @csrf
                <button type="submit" class="btn btn-success">Add To Cart</button>
            </form>
        @endisset

    </div>
</div>
