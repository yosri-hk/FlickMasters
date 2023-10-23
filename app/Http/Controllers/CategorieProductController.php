<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategorieProduct;

class CategorieProductController extends Controller
{
    public function index() {
        $categorieProducts = CategorieProduct::all();
        return view("CategorieProduct.index", ['categorieProducts' => $categorieProducts]);
    }

    public function create() {
        return view("categorieProduct.create");
    }

    public function store(Request $request) {
        $data = $request->validate([
            "name" => "required|string|max:255",
            "description" => "nullable|string",
            // Add any other validation rules specific to CategorieProduct
        ]);

        $categorieProduct = CategorieProduct::create($data);

        return redirect(route('categorieProducts.index'))->with("status", "Categorie Product added successfully");
    }

    public function edit(CategorieProduct $categorieProduct) {
        return view('CategorieProduct.edit', ['categorieProduct' => $categorieProduct]);
    }

    public function update(Request $request, CategorieProduct $categorieProduct) {
        $data = $request->validate([
            "name" => "required|string|max:255",
            "description" => "nullable|string",
            // Add any other validation rules specific to CategorieProduct
        ]);

        $categorieProduct->update($data);

        return redirect(route('categorieProducts.index'))->with('success', "Categorie Product updated successfully");
    }

    public function delete(CategorieProduct $categorieProduct) {
        $categorieProduct->delete();
        return redirect(route('categorieProducts.index'))->with('success', "Categorie Product deleted successfully");
    }
}