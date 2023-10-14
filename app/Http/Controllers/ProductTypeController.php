<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function create()
    {
        return view('product.create_type');
    }

    public function store(Request $request)
    {
        ProductType::create([
            'ctgyName' => $request->ctgyName
        ]);

        return to_route("home");
    }

    public function destroy($id)
    {
        $product = ProductType::findOrFail($id);
        $product->delete();
        return redirect()->route('home')->with('success', 'Product deleted successfully');
    }
}
