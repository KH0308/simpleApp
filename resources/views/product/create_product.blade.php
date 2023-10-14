@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<h1 class="display-one mt-5">PHP Laravel Project - CRUD</h1>
			<div class="d-flex justify-content-left">
				<div class="text-left"><a href="{{route('home')}}" class="btn btn-outline-primary">Back to product list</a></div>
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
				<form id="add-frm" method="POST" action="{{route('store.product')}}" class="border p-3 mt-2">
				@csrf
					<div class="control-group text-left">
						<label for="prdName">Name</label>
						<div>
							<input type="text" id="prdName" class="form-control mb-4" name="prdName"
								placeholder="Enter Product Name" required>
						</div>
					</div>
					<div class="control-group text-left mt-2">
						<label for="prdCtgy">Choose Category</label>
						<div>
							<select class="form-control" name="prdCtgy">
							<option value="" selected>Select a Category</option> <!-- Default option with 'selected' attribute -->
								@foreach ( $productTypes as $Type )
									<option value="{{ $Type->id }}">{{ $Type->ctgyName }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="control-group text-left mt-2">
						<label for="prdPrc">Price</label>
						<div>
							<input type="number" id="prdPrc" class="form-control mb-4" name="prdPrc" min="0" value="0" step=".01"
								placeholder="Enter Price" required>
						</div>
					</div>

					<div class="control-group text-left mt-2">
						<label for="prdRtg">Rating</label>
						<div>
							<input type="number" id="prdRtg" class="form-control mb-4" name="prdRtg" value="5.0" readonly>
						</div>
					</div>

					<div class="control-group text-left mt-2"><button class="btn btn-primary">Add New Product</button></div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection