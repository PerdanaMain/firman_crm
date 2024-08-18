<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy("product_id", "desc")
            ->get();

        return view(
            'product',
            compact('products')
        );
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|numeric',
                'stock' => 'required|numeric',
            ], [
                'price.numeric' => 'Harga produk harus berupa angka',
                'stock.numeric' => 'Stok produk harus berupa angka',
            ]);

            Product::create([
                'product_name' => $request->name,
                'product_description' => $request->description,
                'product_price' => (int) $request->price,
                'product_stock' => (int) $request->stock,
            ]);

            return back()->with('success', 'Product has been added');
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'stock' => 'required',
            ]);

            $product = Product::findOrFail($id);

            $product->update([
                'product_name' => $request->name,
                'product_description' => $request->description,
                'product_price' => $request->price,
                'product_stock' => $request->stock,
            ]);

            return back()->with('success', 'Product has been updated');
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();

            return response()->json([
                'message' => 'Product has been deleted',
            ])->setStatusCode(200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ])->setStatusCode(500);
        }
    }
}