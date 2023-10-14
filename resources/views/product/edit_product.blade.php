@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-one m-5">{{ __('Edit Product') }}</h1>

            <form method="POST" action="{{ route('product.update', $product->id) }}" class="border p-3 mt-2">
                @method('PUT') <!-- Use PUT method for updating -->
                @csrf
                <div class="control-group text-left mt-2">
                    <label for="prdName">Name</label>
                    <input type="text" id="prdName" class="form-control mb-4" name="prdName" value="{{ $product->prdName }}" required>
                </div>
                <div class="control-group text-left mt-2">
                    <label for="prdCtgy">Category</label>
                    <select id="prdCtgy" class="form-control mb-4" name="prdCtgy" required>
                        <option value="{{ $product->productCtgy->id }}" selected>{{ $product->productCtgy->ctgyName }}</option>
                        @foreach ( $productTypes as $Type )
                            <option value="{{ $Type->id }}">{{ $Type->ctgyName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="control-group text-left mt-2">
                    <label for="prdPrc">Price</label>
                    <input type="text" id="prdPrc" class="form-control mb-4" name="prdPrc" value="{{ $product->prdPrc }}" required>
                </div>
                <div class="control-group text-left mt-2">
                    <label for="prdRtg">Rating</label>
                    <input type="text" id="prdRtg" class="form-control mb-4" name="prdRtg" value="{{ $product->prdRtg }}" readonly>
                </div>

                <div class="text-left mt-3 d-flex justify-content-evenly">
                    <button type="submit" class="btn btn-outline-primary btn-block" style="width: 150px; height: 40px;">Update Product</button>
                    <a href="{{ route('home') }}" class="btn btn-outline-primary btn-block ml-2" style="width: 150px; height: 40px;">Back</a>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
