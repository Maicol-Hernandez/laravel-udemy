{{-- Title --}}
<div class="row mb-3">
    <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Ttle') }}</label>

    <div class="col-md-6">
        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
            value="{{ isset($product->title) ? $product->title : old('title') }}" name="title" required
            autocomplete="title" autofocus>
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Description --}}
<div class="row mb-3">
    <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

    <div class="col-md-6">
        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
            value="{{ isset($product->description) ? $product->description : old('description') }}" name="description"
            required autocomplete="title" autofocus>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Price --}}
<div class="row mb-3">
    <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>

    <div class="col-md-6">
        <input id="price" type="number" min="1.0" step="0.01"
            class="form-control @error('price') is-invalid @enderror"
            value="{{ isset($product->price) ? $product->price : old('price') }}" name="price" required
            autocomplete="price" autofocus>
        @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Stock --}}
<div class="row mb-3">
    <label for="stock" class="col-md-4 col-form-label text-md-end">{{ __('Stock') }}</label>

    <div class="col-md-6">
        <input id="stock" type="number" class="form-control @error('stock') is-invalid @enderror"
            value="{{ isset($product->stock) ? $product->stock : old('stock') }}" name="stock" required
            autocomplete="stock" autofocus>
        @error('stock')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Status --}}
<div class="row mb-3">
    <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

    <div class="col-md-6">
        {{ Form::select(
            'status',
            isset($status) ? $status : ['available' => 'Available', 'unavailable' => 'Unavailable'],
            isset($product->status) ? $product->status : old('status'),
            [
                'class' => 'form-control custom-select' . ($errors->has('status') ? ' is-invalid' : ''),
                'name' => 'status',
                'id' => 'status',
                'placeholder' => 'Select Status',
                'required',
            ],
        ) }}
        {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group mb-0 text-right mb-2">
    <button type="submit" class="btn btn-primary">
        Save Product
    </button>
</div>
