<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class SearchComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pageSize;

    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount() {
        $this->sorting = 'default';
        $this->pageSize = 8;
        $this->fill(request()->only('search','product_cat','product_cat_id'));
    }


    public function store($product_id, $product_name, $product_price) {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item Added Success');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        if($this->sorting == 'date') {
            $products = Product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('created_at','ASC')->paginate($this->pageSize);
        }
        elseif($this->sorting == 'price-asc') {
            $products = Product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('regular_price','ASC')->paginate($this->pageSize);
        }
        elseif($this->sorting == 'price-desc') {
            $products = Product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('regular_price','DESC')->paginate($this->pageSize);
        }
        else{
            $products = Product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        $categories = Category::all();
        $sale = Sale::find(1);
        return view('livewire.search-component',['products' => $products, 'categories' => $categories,'sale'=>$sale])->layout('layouts.base');
    }
}
