@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
            <div class="text-center">
                <h1 class="display-one m-5">{{ __('Welcome to product management') }} {{ Auth::user()->name }}</h1>
            </div>
			<div class="text-center d-flex justify-content-evenly">
                <a href="{{route('create.product')}}" button type="button" 
                class="btn btn-outline-primary" style="text-align:left">Add New Product</button></a>
                <a href="{{route('create.category')}}" button type="button" 
                class="btn btn-outline-primary" style="text-align:left">Add New Category</button></a>
            </div>
			<div class="text-center">
                <h3 class="display-one mt-2 text-left">List Product</h3>
                <table class="table mt-3 text-left">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>{{$product->prdName}}</td>
                            <td class="pr-5 text-right">{{$product->productCtgy->ctgyName}}</td>
                            <td>{{$product->prdPrc}}</td>
                            <td>{{$product->prdRtg}}</td>
                            <td><a href="{{ route('product.edit', $product->id) }}" 
                            class="btn btn-outline-primary">Edit</a>
                            <button type="button" class="btn btn-outline-danger ml-1" 
                            onclick="showModel({{ $product->id }})" data-toggle="modal" 
                            data-target="#deleteConfirmationModel">Delete</button>
                            <a href="product/{!! $product->id !!}/show"
                            class="btn btn-outline-primary">Details</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">No products found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <h3 class="display-one mt-2 text-left">List Category</h3>
                <table class="table mt-3 text-left">
                    <thead>
                        <tr>
                            <th scope="col">Num.</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($category as $index => $type)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$type->ctgyName}}</td>
                            <td>
                                <button type="button" class="btn btn-outline-danger ml-1" 
                                onclick="showModelType({{ $type->id }})" data-toggle="modal" 
                                data-target="#deleteConfirmationModelType">Delete</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No Categoory Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
		</div>
	</div>
</div>


<div class="modal fade" id="deleteConfirmationModel" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">Are you sure to delete this record?</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" onClick="dismissModel()">Cancel</button>
				<form id="delete-frm" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="deleteConfirmationModelType" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">Are you sure to delete this record?</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" onClick="dismissModelType()">Cancel</button>
				<form id="delete-frm-type" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
			</div>
		</div>
	</div>
</div>

<script>
    function showModel(id) {
        var frmDelete = document.getElementById("delete-frm");
        frmDelete.action = `{{ url('product') }}/${id}`;
        var confirmationModal = document.getElementById("deleteConfirmationModel");
        confirmationModal.style.display = 'block';
        confirmationModal.classList.remove('fade');
        confirmationModal.classList.add('show');
    }

    function dismissModel() {
        var confirmationModal = document.getElementById("deleteConfirmationModel");
        confirmationModal.style.display = 'none';
        confirmationModal.classList.remove('show');
        confirmationModal.classList.add('fade');
    }

    function showModelType(id) {
        var frmDelete = document.getElementById("delete-frm-type");
        frmDelete.action = `{{ url('product') }}/${id}/category`;
        var confirmationModal = document.getElementById("deleteConfirmationModelType");
        confirmationModal.style.display = 'block';
        confirmationModal.classList.remove('fade');
        confirmationModal.classList.add('show');
    }

    function dismissModelType() {
        var confirmationModal = document.getElementById("deleteConfirmationModelType");
        confirmationModal.style.display = 'none';
        confirmationModal.classList.remove('show');
        confirmationModal.classList.add('fade');
    }
</script>
@endsection