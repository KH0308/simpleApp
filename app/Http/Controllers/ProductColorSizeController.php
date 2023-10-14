<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductColor;
use Illuminate\Http\Request;

class ProductColorSizeController extends Controller
{
    public function createColor($id)
    {
        $productid = Product::findOrFail($id);
        return view('product.create_product_color', compact('productid'));
    }

    public function storeColor(Request $request, $id)
    {
        ProductColor::create([
            'colorName' => $request->colorName
        ]);

        return to_route('product.show', $id);
        // return view('product.show_details');
    }

    public function destroyColor($productId, $id)
    {
        $product = ProductColor::findOrFail($id);
        $product->delete();
        // return redirect()->route('product.show')->with('success', 'Product deleted successfully');
        return redirect()->route('product.show', $productId)->with('success', 'Product color delete successfully');
    }

    public function createSize($id)
    {
        $productid = Product::findOrFail($id);
        return view('product.create_product_size', compact('productid'));
    }

    public function storeSize(Request $request, $id)
    {
        ProductSize::create([
            'sizeName' => $request->sizeName
        ]);

        return to_route('product.show', $id);
        // return view('product.show_details');
    }

    public function destroySize($productId, $id)
    {
        $product = ProductSize::findOrFail($id);
        $product->delete();
        return redirect()->route('product.show', $productId)->with('success', 'Product size delete successfully');
        // return view('product.show_details');
    }
}
