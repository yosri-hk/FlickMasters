<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategorieProduct; 

class ProductController extends Controller

{
    public function details($id)
{
    $product = Product::find($id);

    if ($product) {
        return view('products.details', ['product' => $product]);
    }

}

    public function index() {
        $products = Product::with('categorieProduct')->get();
        return view("products.index", ['products' => $products]);
    }

    public function create() {
        $categories = CategorieProduct::all();
        return view("products.create", ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string|max:255",
            "description" => "nullable|string",
            "price" => "required|numeric|min:0",
            "quantity" => "required|integer|min:0",
            "weight" => "nullable|numeric|min:0",
            "category_id" => "required|exists:categorieProducts,id", 
            "image_url" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048", 
        ]);
    
        if ($request->hasFile('image_url')) {
            $image_url = $request->file('image_url');
            $imageName = time() . '.' . $image_url->getClientOriginalExtension();
            
            $image_url->move(public_path('images'), $imageName);
    
            $data['image_url'] = 'images/' . $imageName;
        }
    
        $product = Product::create($data);
        $product = new Product($data);
$product->category_id = $request->input('category_id'); 

$product->save();
    
        return redirect(route('products.index'))->with("status", "Product added successfully");
    }
    

    public function edit(Product $product) {
        $categories = CategorieProduct::all();
        return view('products.edit', ['product' => $product, 'categories' => $categories]);  
      }

    public function update(Request $request, Product $product) {
        $data = $request->validate([
            "name" => "string|max:255",
            "description" => "nullable|string",
            "price" => "numeric|min:0",
            "quantity" => "integer|min:0",
            "weight" => "nullable|numeric|min:0",
            "category_id" => "exists:categorieProducts,id",
            "image_url" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048", 
        ]);

        $product->category_id = $request->input('category_id');
        
        $product->save();
        $product->update($data);

        return redirect(route('products.index'))->with('success', "Product updated successfully");
    }

    public function delete(Product $product) {
        $product->delete();
        return redirect(route('products.index'))->with('success', "Product deleted successfully");
    }
    public function listProducts() {
        $products = Product::with('categorieProduct')->get();     
           return view("products.listProducts", ['products' => $products]);
    }
    public function destroy(Product $product) {
        $product->delete();
        return redirect(route('products.listProducts'))->with('success', "Product deleted successfully");
    }

    
}
