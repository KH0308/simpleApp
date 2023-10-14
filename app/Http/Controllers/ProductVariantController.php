<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreValidationVariant;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Models\ProductVariant;

class ProductVariantController extends Controller
{
    public function create($id)
    {
        $product = Product::findOrFail($id);
        $productClr = ProductColor::all();
        $productSz = ProductSize::all();
        return view('product.create_product_variant', compact('product', 'productClr', 'productSz'));
    }

    public function edit($id)
    {
        $productVrt = ProductVariant::findOrFail($id);
        return view('product.edit_product_variant', compact('productVrt'));
    }

    public function destroy($productId, $id)
    {
        $productVrt = ProductVariant::findOrFail($id);
        $productVrt->delete();
        return redirect()->route('product.show', $productId)->with('success', 'Product variant deleted successfully');
    }

    public function store(StoreValidationVariant $request)
    {
        ProductVariant::create([
            'productID' => $request->productID,
            'color' => $request->color,
            'size' => $request->size,
            'quantity' => $request->quantity
        ]);

        return to_route("product.show", $request->productID);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = ProductVariant::findOrFail($id);
        $product->update([
            'quantity' => $request->quantity
        ]);
        
        return redirect()->route("product.show", $product->productID);
    }
}
