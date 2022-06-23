<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Sale;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class HomeComponent extends Component
{
    use WithPagination;
    public function store($product_id,$product_name,$product_price) {

        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item Added Success');
        return redirect()->route('product.cart');
    }
    public function render()
    {
        $sliders =HomeSlider::where('status',1)->get();
        $l_products = Product::orderBy('created_at','DESC')->get()->take(12);
        $category = HomeCategory::find(1);
        $cats = explode(',',$category->sel_categories);
        $categories = Category::whereIn('id',$cats)->get();
        $no_of_products = $category->no_of_products;
        $s_products = Product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);
        $sale = Sale::find(1);
        if(Auth::check()){
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);
        }
        return view('livewire.home-component',
        ['l_products' => $l_products,'sliders' => $sliders,'categories' => $categories,'no_of_products' => $no_of_products,'s_products' => $s_products,'sale' => $sale])->layout('layouts.base');

    }
}
