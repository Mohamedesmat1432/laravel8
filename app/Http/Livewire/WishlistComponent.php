<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistComponent extends Component
{
    public function store($product_id,$product_name,$product_price) {

        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item Added Success');
        return redirect()->route('product.cart');
    }

    public function removeFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem) {
            if($witem->id == $product_id){
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return ;
            }
        }
    }
    // dont used in wishlist page
    public function moveFromWishlistToCart($rowId){
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
        $this->emitTo('wishlist-count-component','refreshComponent');

    }

    public function render()
    {
        $sale = Sale::find(1);
        if(Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        return view('livewire.wishlist-component',['sale'=>$sale])->layout('layouts.base');
    }
}
