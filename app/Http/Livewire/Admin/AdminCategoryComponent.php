<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use livewire\WithPagination;
use Illuminate\Support\Str;



class AdminCategoryComponent extends Component
{
    use WithPagination;
    public $searchItem;

    public function deleteCategory($id) {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message_success',' تم حذف القسم بنجاح.');
    }
    public function deleteSubCategory($id) {
        $scategory = Subcategory::find($id);
        $scategory->delete();
        session()->flash('message_success','تم حذف القسم الفرعي بنجاح.');
    }
    public function render()
    {
        $search = '%' .$this->searchItem .'%';
        $categories = Category::where('name','LIKE',$search)->paginate(5);
        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}
