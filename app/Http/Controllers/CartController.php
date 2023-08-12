<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\CartItem;
use App\Movie;
use DB;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addItem($movieId)
    {

        // Adding a movie as an item to a cart.
        // Initialize cart on grounds of logged in user.
        $cart = Cart::where('user_id', Auth::user()->id)->first();

        // If there isn't already a cart, a new one is instantiated to that user.
        if(!$cart) {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }

        // A new item is now added based on movie id being the same as the conditional variable,
        $cartItem = new CartItem();
        $cartItem->movie_id = $movieId;
        $cartItem->cart_id = $cart->id;
        // Consider adding a command that counts down movie quantity each time a movie is added of the same (?movie_id)
        if ($cartItem->movie->quantity == 0)
        {
            return redirect('/');
        }
            DB::table('movies')->decrement('quantity', 1);
        $cartItem->save();

        return redirect('/cart');


    }

    public function showCart()
    {
        // displays current items a user currently has in their cart
        $cart = Cart::where('user_id', Auth::user()->id)->first();

        // A new cart is generated if a user has not got one, but accesses the showCart url.
        if(!$cart) {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }

        // Runs a loop that infers for every item bought, the total value will be increased by that price.

        $items = $cart->cartItems;
        $total = 0;
        foreach($items as $item) {
            $total += $item->movie->price;
        }

        return view('cart.show', ['items'=> $items, 'total' => $total]);

    }

    public function removeItem($id)
    {
        // deletes an item in the user basket
        CartItem::destroy($id);
        DB::table('movies')->increment('quantity', 1);
        return redirect('/cart');
        // Add a code that readds the movie quantity for that specific item.
    }


}
