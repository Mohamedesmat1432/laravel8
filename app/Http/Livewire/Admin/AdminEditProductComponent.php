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
class AdminEditProductComponent extends Component
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
    public $product_id;
    public $newimage;
    public $newimages;
    public $attribute;
    public $inputs = [];
    public $attribute_arr = [];
    public $attribute_values = [];

    public function mount($product_slug) {
        $product = Product::where('slug',$product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->images = explode(",",$product->images);
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->category_id = $product->category_id;
        $this->scategory_id = $product->subcategory_id;
        $this->product_id = $product->id;
        $this->inputs = $product->attributeValues->where('product_id',$product->id)->unique('product_attribute_id')->pluck('product_attribute_id');
        $this->attribute_arr = $product->attributeValues->where('product_id',$product->id)->unique('product_attribute_id')->pluck('product_attribute_id');
        foreach($this->attribute_arr as $attr_arr){
            $allAttributeValues = AttributeValue::where('product_id',$product->id)->where('product_attribute_id',$attr_arr)->get()->pluck('value');
            $valueString = '';
            foreach($allAttributeValues as $value){
                $valueString = $valueString . $value .',';
            }
            $this->attribute_values[$attr_arr] = rtrim($valueString,",");
        }
    }
    public function add(){
        if(!$this->attribute_arr->contains($this->attribute)){
            $this->inputs->push($this->attribute);
            $this->attribute_arr->push($this->attribute);
        }
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
            'slug' =>'required',
            'short_description' =>'required',
            'description' =>'required',
            'regular_price' =>'required|numeric',
            'featured' =>'required',
            'stock_status' =>'required',
            'SKU' =>'required',
            'quantity' =>'required|numeric',
            'category_id' =>'required',
        ]);
        if($this->newimage){
            $this->validateOnly($field,[
                'newimage' =>'required|mimes:jpeg,jpg,png',
            ]);
        }
    }
    public function updateProduct() {
        $this->validate([
            'name' =>'required',
            'slug' =>'required',
            'short_description' =>'required',
            'description' =>'required',
            'regular_price' =>'required|numeric',
            'featured' =>'required',
            'stock_status' =>'required',
            'SKU' =>'required',
            'quantity' =>'required|numeric',
            // 'category_id' =>'required',
        ]);
        if($this->newimage){
            $this->validate([
                'newimage' =>'required|mimes:jpeg,jpg,png',
            ]);
        }
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->quantity = $this->quantity;
        if($this->newimage){
            unlink('assets/images/products'.'/'.$product->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('products',$imageName);
            $product->image = $imageName;
        }
        if($this->newimages){

            if($product->images){
                $images = explode(',',$product->images);

                foreach($images as $image){
                    if($image){
                        unlink('assets/images/products'.'/'.$image);
                    }
                }
            }
            $imagesName = '';
            foreach($this->newimages as $key=>$image ){
                $imgName = Carbon::now()->timestamp. $key. '.' . $image->extension();
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
        AttributeValue::where('product_id',$product->id)->delete();
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
        session()->flash('message_success','.تم تعديل المنتج بنجاح');
    }
    public function changeSubcategory(){
        $this->scategory_id = 0;
    }
    public function render()
    {
        $categories = Category::all();
        $scategories = Subcategory::where('category_id',$this->category_id)->get();
        $pattributes = ProductAttribute::all();
        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories,'scategories'=>$scategories,'pattributes'=>$pattributes])->layout('layouts.base');
    }
}
