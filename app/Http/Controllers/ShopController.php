<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CheckoutRequest;
use App\Product;
use App\Order;
use App\Cart;
use Session;
use Auth;
use Mail;

class ShopController extends Controller
{
  public function addToCart(Request $request, $id) {
      $product = Product::find($id);
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->add($product, $product->id);
      $request->session()->put('cart', $cart);
      return redirect()->route('shop.shoppingCart');
  }

public function reduceByOne($id)
{
  $oldCart = Session::has('cart') ? Session::get('cart') : null;
  $cart = new Cart($oldCart);
  $cart->reduceByOne($id);
  if(count($cart->items) > 0 ){
    Session::put('cart', $cart);
  }
  else{
    Session::forget('cart');
  }

  return redirect()->route('shop.shoppingCart');
}


  public function removeFromCart($id)
  {
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->removeItem($id);

    if(count($cart->items) > 0 ){
      Session::put('cart', $cart);
    }
    else{
      Session::forget('cart');
    }

    return redirect()->route('shop.shoppingCart');
  }

  public function emptyCart()
  {
    Session::forget('cart');
    return redirect()->route('products.index');
  }


  public function getCart()
  {
    if(!Session::has('cart')){
      return view('shop.shopping-cart');
    }
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    return view ('shop.shopping-cart')->withProducts($cart->items)->withTotal($cart->totalPrice);
  }

  public function getCheckout()
  {
    if(!Session::has('cart')){
      return redirect()->back();
    }
    return view('shop.checkout');
  }

  public function postCheckout(CheckoutRequest $request)
  {
    if(!Session::has('cart')){
      return redirect()->back();
    }
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);

    $order = new Order();

    $order->cart = serialize($cart);
    $order->name = $request->input('name');
    $order->address = $request->input('address');
    $order->postcode = $request->input('postcode');
    $order->cardnumber = bcrypt($request->input('cardnumber'));
    $order->lastdigits = substr($request->input('cardnumber'),-4);
    $order->order_key = rand(); //'API generated key'

    Auth::user()->orders()->save($order);
    Session::forget('cart');

    $order->sendEmail($order->name,$order->lastdigits,$order->order_key);

    return redirect()->route('shop.success');

  }




  public function getSuccess()
  {
    return view('shop.success');
  }


}
