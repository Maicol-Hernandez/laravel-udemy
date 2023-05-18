<div class="card">
    <div id="carousel{{ $product->id }}" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($product->images as $image)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img class="d-block w-100 card-img-top" src="{{ asset($image->path) }}" alt="">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $product->id }}"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $product->id }}"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
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
            <form class="d-inline" method="POST"
                action="{{ route('products.carts.store', ['product' => $product->id]) }}">
                @csrf
                <button type="submit" class="btn btn-success">Add To Cart</button>
            </form>
        @endisset

    </div>
</div>
