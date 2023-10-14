@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
            <div class="text-center">
                <h1 class="display-one m-5">{{ ('Details') }} {{ $product->prdName }}</h1>
            </div>
			<div class="d-flex justify-content-between">
                <div>
                    <a href="{{route('home')}}" class="btn btn-outline-primary">Back</a>
                </div>
                <div>
                    <a href="{{ route('create.product.variant', $product->id) }}"
                    button type="button" class="btn btn-outline-primary" style="text-align:left">Add New Variant</button></a>
                    <a href="{{ route('create.color', $product->id) }}"
                    button type="button" class="btn btn-outline-primary" style="text-align:left">Add New Color</button></a>
                    <a href="{{ route('create.size', $product->id) }}"
                    button type="button" class="btn btn-outline-primary" style="text-align:left">Add New Size</button></a>
                </div>
            </div>

            <div class="text-center">
                <h3 class="display-one mt-2 text-left">List Variant</h3>
                <table class="table mt-3  text-left">
                    <thead>
                        <tr>
                            <th scope="col">Color</th>
                            <th scope="col">Size</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($variantProduct as $productVrt)
                        <tr>
                            <td>{!! $productVrt->productColor->colorName !!}</td>
                            <td class="pr-5 text-right">{!! $productVrt->productSize->sizeName !!}</td>
                            <td>{!! $productVrt->quantity !!}</td>
                            <td><a href="{{ route('product.edit.variant', $productVrt->id) }}" 
                            class="btn btn-outline-primary">Edit</a>
                            <button type="button" class="btn btn-outline-danger ml-1" 
                            onclick="showModel({{ $productVrt->id }}, {{ $product->id }})" 
                            data-toggle="modal" data-target="#deleteConfirmationModel">Delete</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">No product variants found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <h3 class="display-one mt-2 text-left">List Color & Size</h3>
            </div>
            <div class="d-flex justify-content-evenly">
                <table class="table mt-3 text-left">
                    <thead>
                        <tr>
                            <th scope="col">Num.</th>
                            <th scope="col">Color</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($color as $index => $productClr)
                        <tr>
                            <td>{!! $index + 1 !!}</td>
                            <td class="pr-5 text-right">{!! $productClr->colorName !!}</td>
                            <td><button type="button" class="btn btn-outline-danger ml-1"
                            onclick="showModelColor({{ $productClr->id }}, {{ $product->id }})"
                            data-toggle="modal" data-target="#deleteConfirmationModelColor">Delete</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No data color found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <table class="table mt-3 text-left">
                    <thead>
                        <tr>
                            <th scope="col">Num.</th>
                            <th scope="col">Size</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($size as $index => $productSz)
                        <tr>
                            <td>{!! $index + 1 !!}</td>
                            <td class="pr-5 text-right">{!! $productSz->sizeName !!}</td>
                            <td><button type="button" class="btn btn-outline-danger ml-1"
                            onclick="showModelSize({{ $productSz->id }}, {{ $product->id }})"
                            data-toggle="modal" data-target="#deleteConfirmationModelSize">Delete</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No data size found</td>
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

<div class="modal fade" id="deleteConfirmationModelColor" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">Are you sure to delete this record?</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" onClick="dismissModelColor()">Cancel</button>
				<form id="delete-frmColor" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="deleteConfirmationModelSize" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">Are you sure to delete this record?</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" onClick="dismissModelSize()">Cancel</button>
				<form id="delete-frmSize" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
			</div>
		</div>
	</div>
</div>

<script>
    function showModel(id, productId) {
        var frmDelete = document.getElementById("delete-frm");
        frmDelete.action = `{{ url('product') }}/${productId}/${id}/variant`;
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

    function showModelColor(id, productId) {
        var frmDelete = document.getElementById("delete-frmColor");
        frmDelete.action = `{{ url('product') }}/${productId}/${id}/color`;
        var confirmationModal = document.getElementById("deleteConfirmationModelColor");
        confirmationModal.style.display = 'block';
        confirmationModal.classList.remove('fade');
        confirmationModal.classList.add('show');
    }

    function dismissModelColor() {
        var confirmationModal = document.getElementById("deleteConfirmationModelColor");
        confirmationModal.style.display = 'none';
        confirmationModal.classList.remove('show');
        confirmationModal.classList.add('fade');
    }

    function showModelSize(id, productId) {
        var frmDelete = document.getElementById("delete-frmSize");
        frmDelete.action = `{{ url('product') }}/${productId}/${id}/size`;
        var confirmationModal = document.getElementById("deleteConfirmationModelSize");
        confirmationModal.style.display = 'block';
        confirmationModal.classList.remove('fade');
        confirmationModal.classList.add('show');
    }


    function dismissModelSize() {
        var confirmationModal = document.getElementById("deleteConfirmationModelSize");
        confirmationModal.style.display = 'none';
        confirmationModal.classList.remove('show');
        confirmationModal.classList.add('fade');
    }
</script>
@endsection