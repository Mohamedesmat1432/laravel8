<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;

    public $sorting;
    public $pageSize;

    public $min_price;
    public $max_price;

    public function mount() {
        $this->sorting = 'default';
        $this->pageSize = 4;

        $this->min_price = 1;
        $this->max_price = 1000;
    }


    public function store($product_id,$product_name,$product_price) {

        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item Added Success');
        return redirect()->route('product.cart');
    }
    public function addToWishList($product_id,$product_name,$product_price){
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
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

    public function render()
    {
        if($this->sorting == 'date') {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at','ASC')->paginate($this->pageSize);
        }
        elseif($this->sorting == 'price-asc') {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','ASC')->paginate($this->pageSize);
        }
        elseif($this->sorting == 'price-desc') {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','DESC')->paginate($this->pageSize);
        }
        else{
            $products = Product::orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        $categories = Category::all();
        $sale = Sale::find(1);

        if(Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        return view('livewire.shop-component',['products' => $products, 'categories' => $categories,'sale'=>$sale])->layout('layouts.base');
    }
}
