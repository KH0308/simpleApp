@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<h1 class="display-one mt-5">Add Variant {{ $product->prdName }}</h1>
			<div class="d-flex justify-content-left">
				<div class="text-left"><a href="{{route('product.show', $product->id)}}" class="btn btn-outline-primary">Back to variant list</a></div>
			</div>

			<div class="card-body">
				@if ($errors->any())
					<div class="alert alert-danger mt-2">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<form id="add-frm" method="POST" action="{{route('store.product.variant', $product->id)}}" class="border p-3 mt-2">
				@csrf
                    <div class="control-group text-left mt-2">
                        <input type="hidden" id="productID" class="form-control mb-4" name="productID" value="{{ $product->id }}">
                    </div>
					<div class="control-group text-left mt-2">
						<label for="color">Choose Color</label>
						<div>
							<select class="form-control" name="color">
							<option value="" selected>Select a Color</option> <!-- Default option with 'selected' attribute -->
								@foreach ( $productClr as $Color )
									<option value="{{ $Color->id }}">{{ $Color->colorName }}</option>
								@endforeach
							</select>
						</div>
					</div>
                    <div class="control-group text-left mt-2">
						<label for="size">Choose Size</label>
						<div>
							<select class="form-control" name="size">
							<option value="" selected>Select a Size</option> <!-- Default option with 'selected' attribute -->
								@foreach ( $productSz as $Size )
									<option value="{{ $Size->id }}">{{ $Size->sizeName }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="control-group text-left mt-2">
						<label for="quantity">Quantity</label>
						<div>
							<input type="number" id="quantity" class="form-control mb-4" name="quantity" min="0" value="0" 
                            placeholder="Enter Quantity" required>
						</div>
					</div>
					<div class="control-group text-left mt-2"><button class="btn btn-primary">Add New Variant</button></div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection