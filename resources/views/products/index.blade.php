<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h1>Product List</h1>
    <ul>
        @foreach ($products as $product)
            <li>
                <h2>{{ $product->title }} (SKU: {{ $product->sku }})</h2>
                <p>{{ $product->description }}</p>
                <p>Price: {{ $product->regular_price }} (Sale: {{ $product->sale_price }})</p>
                <p>Size: {{ $product->size }}</p>
                <p>Stock Status: {{ $product->stock_status }}</p>
                <img src="{{ $product->image_src }}" alt="{{ $product->image_alt }}" width="100">
            </li>
        @endforeach
    </ul>
</body>
</html>
