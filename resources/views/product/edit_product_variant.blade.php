@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-one m-5">{{ __('Edit Product Variant') }}</h1>

            <form method="POST" action="{{ route('product.update.variant', $productVrt->id) }}" class="border p-3 mt-2">
                @method('PUT') <!-- Use PUT method for updating -->
                @csrf
                    <div class="control-group text-left mt-2">
                        <label for="prdName">Product Name</label>
                        <input type="text" id="prdName" class="form-control mb-4" name="prdName" value="{{ $productVrt->product->prdName }}" readonly>
                    </div>
                    <div class="control-group text-left mt-2">
                        <label for="vrtClr">Variant Color</label>
                        <input type="text" id="vrtClr" class="form-control mb-4" name="vrtClr" value="{{ $productVrt->productColor->colorName }}" readonly>
                    </div>
                    <div class="control-group text-left mt-2">
                        <label for="vrtSz">Variant Size</label>
                        <input type="text" id="vrtSz" class="form-control mb-4" name="vrtSz" value="{{ $productVrt->productSize->sizeName }}" readonly>
                    </div>
                    <div class="control-group text-left mt-2">
						<label for="quantity">Variant Quantity</label>
						<div>
							<input type="number" id="quantity" class="form-control mb-4" name="quantity" min="0" value="{{ $productVrt->quantity }}" 
                            placeholder="Enter Quantity" required>
						</div>
					</div>
                    <div class="text-left mt-3 d-flex justify-content-evenly">
                        <button type="submit" class="btn btn-outline-primary btn-block" style="width: 150px; height: 40px;">Update Product</button>
                        <a href="{{ route('product.show', $productVrt->productID) }}" class="btn btn-outline-primary btn-block ml-2" style="width: 150px; height: 40px;">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
