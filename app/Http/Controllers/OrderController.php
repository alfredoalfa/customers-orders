<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Symfony\Component\HttpFoundation\Response;
use PDF;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('products')->get();
        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        $order->load('products');

        return view('orders.show', compact('order'));
    }

    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $order = Order::create($request->all());

        $products = $request->input('products', []);
        $quantities = $request->input('quantities', []);

        foreach ($products as $key => $product ) {
            if(isset($product[$key])) {
                $order->products()->attach($products[$key], ['quantity' => $quantities[$key]]);
            }
        }

        return redirect()->route('order.index');
    }

    public function edit($id)
    {
        $products = Product::all();

        $order = Order::find($id);
        $order->load('products');

        return view('orders.edit', compact('products', 'order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->update($request->all());

        $order->products()->detach();
        $products = $request->input('products', []);
        $quantities = $request->input('quantities', []);

        foreach ($products as $key => $product ) {
            if(isset($product[$key])) {
                $order->products()->attach($products[$key], ['quantity' => $quantities[$key]]);
            }
        }

        return redirect()->route('order.index');
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return back();
    }

    public function downloadPDF($id)
    {
        $order = Order::find($id);
        $order->load('products');
        $pdf = PDF::loadView('pdf', compact('order'));

        return $pdf->download('order.pdf');
    }
}
