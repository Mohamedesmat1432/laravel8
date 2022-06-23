<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class HeaderComponent extends Component
{
    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount() {
        $this->product_cat = 'All Category';
        $this->fill(request()->only('searh','product_cat','product_cat_id'));
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.header-component',['categories'=>$categories]);
    }
}
