<?php

namespace App\Http\Controllers\Panel;


use App\Models\PanelProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Scopes\AvailableScope;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index')->with([
            'products' => PanelProduct::without('images')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = PanelProduct::create($request->validated());

        return redirect()
            ->route('products.index')
            ->withSuccess("The new product with id {$product->id} was created");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(PanelProduct $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function edit(PanelProduct $product)
    {
        $status = PanelProduct::select('status')
            ->groupByRaw('status')
            ->pluck('status', 'status');

        return view('products.edit', compact('product', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param PanelProduct $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, PanelProduct $product)
    {
        $product->update($request->validated());

        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was updated");
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(PanelProduct $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->withSuccess("The product was deleted");
    }
}
