<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Order::class, 'order');
    }

    public function index()
    {
        $orders = Order::all();
        return View::make('orders.index', compact(['orders']));
    }

    public function create()
    {
        $products = Product::all(['id', 'name']);
        return View::make('orders.create', compact(['products']));
    }

    public function store(StoreOrderRequest $request)
    {
        $productIds = Collection::make($request->input('products'));
        $csv = implode(",", $productIds->unique()->all());
        Order::create([
            'requester_id' => Auth::id(),
            'product_ids_csv' => $csv
        ]);

        return Redirect::route('orders.index');
    }

    public function show(Order $order)
    {
        $requester = "{$order->requester->name} ({$order->requester->unity->name})";
        $date = Str::title($order->date->translatedFormat('l, d/m/Y'));
        $productIds = explode(',', $order->product_ids_csv);
        $products = [];

        foreach ($productIds as $productId) {
            $product = Product::find($productId);

            if ($product)
                $products []= $product;
        }

        return View::make('orders.show', compact(['order', 'requester', 'date', 'products']));
    }

    public function edit(Order $order)
    {
        $productIds = explode(',', $order->product_ids_csv);
        $orderProducts = [];
        $products = Product::all(['id', 'name']);

        foreach ($productIds as $productId) {
            $product = Product::find($productId);

            if ($product)
                $orderProducts []= $product;
        }

        return View::make('orders.edit', compact(['order', 'orderProducts', 'products']));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $productIds = Collection::make($request->input('products'));
        $csv = implode(",", $productIds->unique()->all());
        $order->update([
            'product_ids_csv' => $csv
        ]);

        return Redirect::route('orders.show', $order->id);

    }

    public function destroy(Order $order)
    {
        $order->delete();
        return Redirect::route('orders.index');
    }
}
