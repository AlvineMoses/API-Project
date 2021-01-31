<?php

namespace App\Http\Controllers\FoodApp;

use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index() {
        return view('index');
    }

    public function listcart() {
        if (!Session::has('cart')) {
            return view('food-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('food-cart', ['menus' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
}
