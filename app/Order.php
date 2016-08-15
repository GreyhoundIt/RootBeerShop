<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Mail;
use Auth;

class Order extends Model
{
    //set up relationships
    public function user()
    {
      return $this->belongsTo('App\User');
    }

    /**
     * Send conformation email
     *
     * @param  string  $name
     * @param  string  $card
     * @param  string  $key
     * 
     */

    public function sendEmail($name,$card,$key){


      Mail::send('emails.orderemail', array('name' => $name, 'card' => $card, 'key' =>$key), function ($message)
      {
        $message->to(Auth::user()->email, $name = null);
        $message->subject('Your Order has been placed');
      });
    }
}
