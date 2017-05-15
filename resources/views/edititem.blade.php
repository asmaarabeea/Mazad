@extends('product.index')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<form method="post" action="{{URL('edit')}}/{{$product->pid}}" enctype="multipart/form-data">
		<input type="hidden" name="id" value="{{$product->pid}}">
			{{csrf_field()}}
			<div class="form-group">
				<label for="productName">product:</label>
				<input type="text" value="{{$product->productName}}" class="form-control" name="productName">
			</div>
			<div class="form-group">
				<label for="price">Price:</label>
				<input type="number" value="{{$product->price}}" class="form-control" name="price">
			</div>
			<div class="checkbox">
				@if($product->online)
					<label>
						<input type="checkbox" checked name="online"> Online
					</label>
				@else
					<label>
						<input type="checkbox" name="online"> Online
					</label>
				@endif

			</div>
			<div class="form-group">
				<label for="product_desc">Description:</label>
				<textarea class="form-control" 
				name="product_desc">{{$product->product_desc}}</textarea>
			</div>
			<div class="form-group">
				<label for="image">Image:</label>
				<input type="file" value="{{$product->product_img}}" name="image">
			</div>
			<div class="col-md-6 col-md-offset-4">
				<button name="saveItem" value="saveItem" class="btn btn-primary col-md-3">Save</button>
				<button name="cancel" value="cancel" class="btn btn-primary col-md-3 col-md-offset-3">Cancel</button>
			</div>
		</form>
	</div>
</div>
@endsection