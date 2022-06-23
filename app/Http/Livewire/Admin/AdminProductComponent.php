<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;

    public $searchItem;

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if($product->image)
        {
            unlink('assets/images/products'.'/'. $product->image);
        }

        if($product->images)
        {
            $images = explode(",",$product->images);

            foreach($images as $image)
            {
                if($image)
                {
                    unlink('assets/images/products'.'/'.$image);
                }
            }
        }

        $product->delete();
        session()->flash('message_success','Product Has Been Deleted Successfuly!');
    }

    public function render()
    {
        $search = '%' .$this->searchItem .'%';
        $products = Product::where('name','LIKE',$search)->
        orWhere('regular_price','LIKE',$search)->
        orWhere('sale_price','LIKE',$search)->
        orWhere('stock_status','LIKE',$search)->
        orderBy('id','DESC')->paginate(5);
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.base');
    }
}
