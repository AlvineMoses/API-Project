<?php

namespace App\Http\Controllers\Admin;

use Stripe\Order;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index() {
        $orders = Orders::all();
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('admin.dashboard')->with('orders', $orders);
    }
}
