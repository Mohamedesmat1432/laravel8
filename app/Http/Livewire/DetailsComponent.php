<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class DetailsComponent extends Component
{
    public $slug;
    public $qty;
    public $sattr = [];

    public function mount($slug) {
        $this->slug = $slug;
        $this->qty = 1;
    }

    public function store($product_id,$product_name,$product_price) {
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price,$this->sattr)->associate('App\Models\Product');
        session()->flash('success_message','Item Added Success');
        return redirect()->route('product.cart');
    }

    public function render()
    {

        $product = Product::where('slug',$this->slug)->first();
        $popular_product = Product::inRandomOrder()->limit(4)->get();
        $related_product = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(4)->get();
        $sale = Sale::find(1);
        if(Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        return view('livewire.details-component',['product' => $product,'popular_product'=>$popular_product,'related_product'=>$related_product,'sale'=>$sale])->layout('layouts.base');
    }
}
