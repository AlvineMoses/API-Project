<?php

namespace App\Http\Controllers\FoodApp;

use App\Cart;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Menu;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    public function index() {
        $menus = Menu::all();
        return view('food-menu')->with('menus', $menus);
    }

    public function addToCart(Request $request, $id) {
        $menus = Menu::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = New Cart($oldCart);
        $cart->add($menus, $menus->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('menu');

    }

    public function cartReduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = New Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items)) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('foodcart');
    }

    public function removeFromCart($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = New Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items)) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('foodcart');
    }

    public function checkout() {
        if (!Session::has('cart')) {
            return view('food-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('checkout', ['total' => $total]);
    }


    public function charge(Request $request) {
        if(!Session::has('cart')) {
            return redirect()->route('foodcart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        //$stripe = new \Stripe\StripeClient(
        //    'sk_test_51Hj5O7D6AxQdXmkSyA7hU54zrPA9ghhmhG1T5e7F6HkYlEvnx5F7xv1I4vTsYcp0CdAQVingE8LfdqfUiahLtjym0021CBnQhI'
        //);
        Stripe::setApiKey('sk_test_51Hj5O7D6AxQdXmkSyA7hU54zrPA9ghhmhG1T5e7F6HkYlEvnx5F7xv1I4vTsYcp0CdAQVingE8LfdqfUiahLtjym0021CBnQhI');
        try {
            $charges = Charge::create( array(
                'amount' => $cart->totalPrice * 100,
                'currency' => 'kes',
                'source' => $request->input('stripeToken'),
                'description' => 'Test Charge',
            ));

            $order = new Orders();
            $order->cart =serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charges->id;

            Auth::user()->orders()->save($order);

        } catch (\Exception  $e){
            return redirect()->route('getCheckout')->with('error', $e->getMessage());
        }

        Session::forget('cart');

        return redirect()->route('user_dashboard')->with('success', 'Order made successfully!');
    }

}
