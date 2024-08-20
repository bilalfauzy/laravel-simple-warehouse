<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // lists
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));

    }

    public function create()
    {
        return view('products.addproduct');
    }

    // new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'required',
        ]);

        $existingProduct = Product::where('name', $request->name)->first();

        if ($existingProduct) {
            $existingProduct->quantity += $request->quantity;
            $existingProduct->save();
        } else {
            Product::create([
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'description' => $request->description
            ]);
        }

        return redirect()->route('product.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.product', compact('product'));
    }


    // update product
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        Product::findOrFail($id)->update($request->all());
        return redirect()->route('product.index')
            ->with('success', 'Product updated successfully.');
    }

    // delete
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')
            ->with('success', 'Product deleted successfully');
    }
}