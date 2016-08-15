<?php
namespace App;
class Cart
{
    public $items = null; //single or group of products
    public $totalQty = 0;
    public $totalPrice = 0;
    public function __construct($oldCart)
    {
        // if there is an session 'cart' already then reuse data
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }
    public function add($item, $id) {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) { //check items in the cart
            if (array_key_exists($id, $this->items)) { //if any items already in cart are the same as the item we are adding
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++; //update quantity
        $storedItem['price'] = $item->price * $storedItem['qty']; //update price
        $this->items[$id] = $storedItem; //set item id
        $this->totalQty++;  //update carts total quantity
        $this->totalPrice += $item->price; //update carts total price
    }

    public function reduceByOne($id)
    {
      $this->items[$id]['qty']--; //reduce items quantity
      $this->items[$id]['price'] -= $this->items[$id]['item']['price']; //reduce items total price
      $this->totalQty--; //reduce carts total quantity
      $this->totalPrice -= $this->items[$id]['item']['price']; //reduce carts total price

      if($this->items[$id]['qty'] <= 0){ // if no items of type in cart remove from cart
        unset($this->items[$id]);
      }
    }


    public function removeItem($id)
    {
      $this->totalQty -= $this->items[$id]['qty']; // reduce the total quantity
      $this->totalPrice -= $this->items[$id]['price'];  //reduce the total price
      unset($this->items[$id]); //remove items from cart
    }
}
