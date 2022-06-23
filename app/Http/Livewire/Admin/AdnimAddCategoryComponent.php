<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Illuminate\Support\Str;

class AdnimAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $category_id;

    public function generateSlug() {
        $this->slug = Str::slug($this->name);
    }
    public function updated($field) {
        $this->validateOnly($field,[
            'name' =>'required',
            'slug' =>'required|unique:categories',
        ]);
    }
    public function resetInputField(){
        if($this->category_id){
            $this->name = '';
            $this->slug = '';
            $this->category_id = '';
        }
        else{
            $this->name = '';
            $this->slug = '';
        }
    }
    public function addCategory() {
        $this->validate([
            'name' =>'required',
            'slug' =>'required|unique:categories',
        ]);
        if($this->category_id){
            $scategory = new Subcategory();
            $scategory->name = $this->name;
            $scategory->slug = $this->slug;
            $scategory->category_id = $this->category_id;
            $scategory->save();
            session()->flash('message_success','.تم اضافة القسم الفرعي بنجاح');

        }
        else{
            $category = new Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->save();
            session()->flash('message_success','.تم اضافة القسم بنجاح');
            }
            $this->resetInputField();
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.adnim-add-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}
