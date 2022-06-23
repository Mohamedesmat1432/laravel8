<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;

use Livewire\Component;
use Livewire\WithPagination;

class AdminProductAttributeComponent extends Component
{
    use WithPagination;
    public $name;
    public $attribute_id;

    public function resetInputField(){
        $this->name = '';
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required'
        ]);
    }

    public function addAttribute(){
        $this->validate([
            'name'=>'required'
        ]);
        $pattribute = new ProductAttribute();
        $pattribute->name = $this->name;
        $pattribute->save();
        $this->resetInputField();
        $this->emit('addedAttribute');
        session()->flash('message','Product Attribute Has Been Created Successfully!');
    }

    public function edit($attribute_id){
        $pattribute = ProductAttribute::where('id',$attribute_id)->first();
        $this->attribute_id = $pattribute->id;
        $this->name = $pattribute->name;
    }
    public function updateAttribute(){
        $this->validate([
            'name'=>'required'
        ]);
        $pattribute = ProductAttribute::find($this->attribute_id);
        $pattribute->name = $this->name;
        $pattribute->save();
        session()->flash('message','Product Attribute Has Been Updated Successfully!');
        $this->resetInputField();
        $this->emit('updatedAttribute');
    }
    public function deleteAttribute($attribute_id){
        $pattribute = ProductAttribute::find($attribute_id);
        $pattribute->delete();
        session()->flash('message','Product Attribute Has Been Deleted Successfully!');
    }
    public function render()
    {
        $pattributes = ProductAttribute::paginate(10);
        return view('livewire.admin.admin-product-attribute-component',['pattributes'=>$pattributes])->layout('layouts.base');
    }
}
