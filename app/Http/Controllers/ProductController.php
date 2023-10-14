<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductType;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreValidation;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all(); // Replace with your actual query to retrieve products
        return view('product.list', compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productTypes = ProductType::all();
        return view('product.create_product', compact('productTypes'));
    }

    public function store(StoreValidation $request)
    {
        Product::create([
            'prdName' => $request->prdName,       // Make sure 'title' matches your database column name
            'prdCtgy' => $request->prdCtgy,  // Use 'prdCtgy' to match your database column name
            'prdPrc' => $request->prdPrc,      // Use 'prdPrc' to match your database column name
            'prdRtg' => $request->prdRtg     // Use 'prdRtg' to match your database column name
        ]);

        return to_route("home");
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $productTypes = ProductType::all();
        return view('product.edit_product', compact('product', 'productTypes'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('home')->with('success', 'Product deleted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $variantProduct = $product->productVrt;
        $color = ProductColor::all();
        $size = ProductSize::all();
        //dd($quantityStocks);
        return view('product.show_details', compact('product', 'variantProduct', 'color', 'size'));
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
        $product = Product::findOrFail($id);
        $product->update([
            'prdName' => $request->prdName,
            'prdCtgy' => $request->prdCtgy,
            'prdPrc' => $request->prdPrc
        ]);
        
        return redirect()->route("home");
    }
}
