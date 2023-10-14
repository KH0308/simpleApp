@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<h1 class="display-one mt-5">PHP Laravel Project - CRUD</h1>
			<div class="d-flex justify-content-left">
				<div class="text-left"><a href="{{route('product.show', $productid->id)}}" class="btn btn-outline-primary">Back to variant list</a></div>
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
				<form id="add-frm" method="POST" action="{{route('store.size', $productid->id)}}" class="border p-3 mt-2">
				@csrf
					<div class="control-group text-left">
						<label for="sizeName">Size Name</label>
						<div>
							<input type="text" id="sizeName" class="form-control mb-4" name="sizeName"
								placeholder="Enter Size Name(exp:X,S,40,29)" required>
						</div>
					</div>
					<div class="control-group text-left mt-2"><button class="btn btn-primary">Add New Size</button></div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection