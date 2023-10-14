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
				<form id="add-frm" method="POST" action="{{route('store.category')}}" class="border p-3 mt-2">
				@csrf
					<div class="control-group text-left">
						<label for="ctgyName">Category Name</label>
						<div>
							<input type="text" id="ctgyName" class="form-control mb-4" name="ctgyName"
								placeholder="Enter Category Name" required>
						</div>
					</div>
					<div class="control-group text-left mt-2"><button class="btn btn-primary">Add New Category</button></div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection