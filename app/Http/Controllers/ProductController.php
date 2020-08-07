<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $product = new Product;
        $product->name = 'God of War';
        $product->price = 40;
        $product->description = 40;

        $product->save();

        $orders = Order::find([3, 4]);
        foreach ($orders as $clave => $order) {
            $product->orders()->attach(
                $order, ['quantity' => $clave]
            );
        }

        return 'Success';
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function removeOrder(Product $product)
    {
        $order = Order::find(3);
         dump($order);
         die();
        $product->orders()->detach($order);

        return 'Success';
    }
}
