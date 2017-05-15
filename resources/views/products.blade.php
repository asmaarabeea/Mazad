<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mazad's Products</title>
</head>
<body>
	@foreach($products as $product)
		{{ $product->productName }}
	@endforeach
</body>
</html>