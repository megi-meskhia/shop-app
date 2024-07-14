<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $products = Product::get();
       
       return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|max:10000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        } else {
            $validated['image'] = null;
        }

        Product::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price' => $validated['price'] * 100,
            'image' => $validated['image']
        ]);

        return redirect('/products')->with('add_successful', 'Product was Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        return view('products.edit', ['product' => $product]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|max:10000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //TODO if products already had photo, and client uploaded new one, old photo should be deleted
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        } else {
            $validated['image'] = null;
        }

        $product->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price' => $validated['price'] * 100,
            'image' => $validated['image']
        ]);

        return redirect('/products')->with('edit_successful', 'Product was Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        // TODO delete product photos

        return redirect('/products')->with('edit_delete', 'Product was Deleted');

    }
}
