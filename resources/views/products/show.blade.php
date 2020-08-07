// show.blade.php

<h2>Product Name: </h2>
<p>{{ $product->name }} || ${{ money_format($product->price, 2) }}</p>

<h3>Product Belongs to</h3>

<ul>
    @foreach($product->orders as $order)
        <li>{{ $order->comment }}</li>
    @endforeach
</ul>
