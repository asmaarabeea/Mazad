@extends('product.index')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<form method="post" action="{{URL('myitem')}}" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label for="productName">product:</label>
				<input type="text" class="form-control" name="productName">
			</div>
			<div class="form-group">
				<label for="price">Price:</label>
				<input type="number" class="form-control" name="price">
			</div>
			<div class="checkbox">
				<label><input type="checkbox" name="online"> Online</label>
			</div>
			<div class="form-group">
				<label for="product_desc">Description:</label>
				<textarea class="form-control" name="product_desc"></textarea>
			</div>
			<div class="form-group">
				<label for="image">Image:</label>
				<input type="file" name="image">
			</div>
			      
			<div class="col-md-6 col-md-offset-4">
				<button name="saveItem" value="saveItem" class="btn btn-primary col-md-3">Save</button>
				<button name="cancel" value="cancel" class="btn btn-primary col-md-3 col-md-offset-3">Cancel</button>
			</div>
		</form>
	</div>
</div>
@endsection