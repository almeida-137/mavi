<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Lista todos os produtos
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    // Exibe um único produto
    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json($product);
        }
        return response()->json(['message' => 'Product not found'], 404);
    }

    // Cria um novo produto
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'nullable|string',
        ]);

        $product = Product::create($validatedData);
        return response()->json($product, 201);
    }

    // Atualiza um produto existente
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product) {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric',
                'stock' => 'required|integer',
                'category' => 'nullable|string',
            ]);

            $product->update($validatedData);
            return response()->json($product);
        }

        return response()->json(['message' => 'Product not found'], 404);
    }

    // Deleta um produto
    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully']);
        }

        return response()->json(['message' => 'Product not found'], 404);
    }
}
