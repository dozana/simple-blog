<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Product;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;

use Illuminate\Http\Request;

class ProductController extends IndexController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.shop.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shop.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $image = $request->image->store('products');

        $post = Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $image
        ]);

        session()->flash('success', 'Product created successfully.');

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.shop.products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->only(['title','price','description']);

        // check if new image
        if($request->hasFile('image')) {
            // upload it
            $image = $request->image->store('products');

            // delete old one
            $product->deleteImage();

            $data['image'] = $image;
        }

        $product->update($data);

        session()->flash('success', 'Product updated successfully.');

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        $product->deleteImage();
        $product->delete();

        session()->flash('success', 'Product deleted successfully.');

        return redirect()->route('admin.products.index');
    }
}
