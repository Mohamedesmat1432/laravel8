<?php

namespace App\Http\Livewire\Admin;

use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Subcategory;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price = '';
    public $SKU;
    public $quantity;
    public $image;
    public $images;
    public $stock_status;
    public $featured;
    public $category_id;
    public $scategory_id;

    public $attribute = 0;
    public $inputs = [];
    public $attribute_arr = [];
    public $attribute_values;

    public function mount() {
        $this->stock_status = 'instock';
        $this->featured = '0';
    }
    public function add(){
        if(!in_array($this->attribute,$this->attribute_arr)){
            array_push($this->inputs,$this->attribute);
            array_push($this->attribute_arr,$this->attribute);
        }
        // return 'please choose attribute';
    }
    public function remove($attribute){
        unset($this->inputs[$attribute]);
    }
    public function generateSlug() {
        $this->slug = Str::slug($this->name,'-');
    }
    public function updated($field) {
        $this->validateOnly($field,[
            'name' =>'required',
            'slug' =>'required|unique:products',
            'short_description' =>'required',
            'description' =>'required',
            'regular_price' =>'required|numeric',
            'sale_price' =>'required|numeric',
            'SKU' =>'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'quantity' =>'required|numeric',
            'image' =>'required|mimes:jpeg,png,jpg',
            'category_id' =>'required',
        ]);
    }
    public function resetInputField(){
        $this->name = '';
        $this->slug = '';
        $this->short_description = '';
        $this->description = '';
        $this->regular_price = '';
        $this->sale_price = '';
        $this->SKU = '';
        $this->stock_status = '';
        $this->featured = '';
        $this->quantity = '';
        $this->image = '';
        $this->category_id = '';
        if($this->images){
            $this->images = '';
        }
        if($this->scategory_id){
            $this->scategory_id = '';
        }
    }
    public function addProduct() {
        $this->validate([
            'name' =>'required',
            'slug' =>'required|unique:products',
            'short_description' =>'required',
            'description' =>'required',
            'regular_price' =>'required|numeric',
            'sale_price' =>'required|numeric',
            'SKU' =>'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'quantity' =>'required|numeric',
            'image' =>'required|mimes:jpeg,png,jpg',
            'category_id' =>'required',

        ]);
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->SKU = $this->SKU;
        $product->quantity = $this->quantity;

        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image = $imageName;

        if($this->images){
            $imagesName = '';
            foreach($this->images as $key=>$image){
                $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('products',$imgName);
                $imagesName = $imagesName . ',' . $imgName;
            }
            $product->images = $imagesName;
        }
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->category_id = $this->category_id;
        if($this->scategory_id){
            $product->subcategory_id = $this->scategory_id;
        }
        $product->save();
        foreach($this->attribute_values as $key => $attribute_value){
            $attr_values = explode(",",$attribute_value);
            foreach($attr_values as $value){
                $attr_val = new AttributeValue();
                $attr_val->product_attribute_id = $key;
                $attr_val->value = $value;
                $attr_val->product_id = $product->id;
                $attr_val->save();
            }
        }
        session()->flash('message_success','.تم اضافة المنتج بنجاح');
        $this->resetInputField();

    }
    public function changeSubcategory(){
        $this->scategory_id = 0;
    }
    public function render()
    {
        $categories = Category::all();
        $scategories = Subcategory::where('category_id',$this->category_id)->get();
        $pattributes = ProductAttribute::all();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories,'scategories'=>$scategories,'pattributes'=>$pattributes])->layout('layouts.base');
    }
}
