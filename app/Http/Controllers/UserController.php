<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth;

class UserController extends Controller
{
    public function getProfile()
    {
      $orders = Auth::user()->orders;
      $orders->transform(function($order, $key) {
          $order->cart = unserialize($order->cart);
          return $order;
       });
      return view('user.profile')->withOrders($orders);
    }
}
