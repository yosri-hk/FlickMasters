<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view("products.index", ['products' => $products]);
    }

    public function create() {
        return view("products.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string|max:255",
            "description" => "nullable|string",
            "price" => "required|numeric|min:0",
            "quantity" => "required|integer|min:0",
            "weight" => "nullable|numeric|min:0",
            // "category_id" => "required|exists:categories,id",
            "image_url" => "required|image|mimes:jpeg,png,jpg,gif|max:2048", // Example image validation
        ]);
    
        if ($request->hasFile('image_url')) {
            $image_url = $request->file('image_url');
            $imageName = time() . '.' . $image_url->getClientOriginalExtension();
            // Save the image to the public/images directory
            $image_url->move(public_path('images'), $imageName);
    
            $data['image_url'] = 'images/' . $imageName;
        }
    
        $product = Product::create($data);
    
        return redirect(route('products.index'))->with("status", "Product added successfully");
    }
    

    public function edit(Product $product) {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product) {
        $data = $request->validate([
            "name" => "required|string|max:255",
            "description" => "nullable|string",
            "price" => "required|numeric|min:0",
            "quantity" => "required|integer|min:0",
            "weight" => "nullable|numeric|min:0",
            // "category_id" => "required|exists:categories,id",
            "image_url" => "nullable|url",
        ]);

        $product->update($data);

        return redirect(route('products.index'))->with('success', "Product updated successfully");
    }

    public function delete(Product $product) {
        $product->delete();
        return redirect(route('products.index'))->with('success', "Product deleted successfully");
    }
}
