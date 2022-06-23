<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Subcategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
    use WithPagination;

    public $sorting;
    public $pageSize;
    public $min_price;
    public $max_price;
    public $category_slug;
    public $scategory_slug;

    public function mount($category_slug,$scategory_slug=null) {
        $this->sorting = 'default';
        $this->pageSize = 4;
        $this->min_price = 1;
        $this->max_price = 1000;
        $this->category_slug = $category_slug;
        $this->scategory_slug = $scategory_slug;
    }


    public function store($product_id, $product_name, $product_price) {

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
        $category_id = null;
        $category_name = '';
        $filter = '';
        if($this->scategory_slug){
            $scategory = Subcategory::where('slug',$this->scategory_slug)->first();
            $category_id = $scategory->id;
            $category_name = $scategory->name;
            $filter = 'sub';
        }
        else{
            $category = Category::where('slug',$this->category_slug)->first();
            $category_id = $category->id;
            $category_name = $category->name;
            $filter = '';
        }
        if($this->sorting == 'date') {
            $products = Product::where($filter.'category_id',$category_id)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at','ASC')->paginate($this->pageSize);
        }
        elseif($this->sorting == 'price-asc') {
            $products = Product::where($filter.'category_id',$category_id)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','ASC')->paginate($this->pageSize);
        }
        elseif($this->sorting == 'price-desc') {
            $products = Product::where($filter.'category_id',$category_id)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','DESC')->paginate($this->pageSize);
        }
        else{
            $products = Product::where($filter.'category_id',$category_id)->paginate($this->pageSize);
        }

        $categories = Category::all();
        $sale = Sale::find(1);

        return view('livewire.category-component',['products' => $products,'categories' => $categories,'category_name' => $category_name,'sale'=>$sale])->layout('layouts.base');
    }
}
