<?php

namespace App\Http\Controllers\Site\Shop;

use App\Cart;
use App\Order;
use App\Product;
use App\Http\Controllers\Site\IndexController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class ProductController extends IndexController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(4);

        return view('site.shop.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('site.shop.products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));

        return redirect()->route('site.products.index');
    }

    public function shoppingCart()
    {
        if(!Session::has('cart')) {
            return view('site.shop.products.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('site.shop.products.shopping-cart')
            ->with('products', $cart->items)
            ->with('totalPrice', $cart->totalPrice);
    }

    public function checkout()
    {
        if(!Session::has('cart')) {
            return view('site.shop.products.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        return view('site.shop.products.checkout')->with('total', $total);
    }

    public function postCheckout(Request $request)
    {
        if(!Session::has('cart')) {
            return redirect()->route('site.products.shoppingCart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        // Stripe
//        Stripe::setApiKey('sk_test_51KCimBH6eFMZkh3Tr9ySFfTCVXU74VXxgX1jDjLZO9Czw5dXztqQRNYdMCCQDEzUt4W3ve0mHSOJ3SKEeQcagHpV00AhdX5Wx1');
//        try {
//            Charge::create([
//                "amount" => $cart->totalPrice * 100,
//                "currency" => "usd",
//                "source" => $request->input('stripeToken'),
//                "description" => 400,
//            ]);
//        } catch (\Exception $e) {
//            return redirect()->route('site.products.checkout')->with('error', $e->getMessage());
//        }

        $order = new Order();
        $order->cart = serialize($cart);
        $order->address = $request->input('address');
        $order->name = $request->input('name');
        $order->payment_id = substr(str_shuffle("0123456789"), 0, 10);

        Auth::user()->orders()->save($order);

        Session::forget('cart');
        return redirect()->route('site.products.index')->with('success', 'Successfully purchased products!');
    }
}
