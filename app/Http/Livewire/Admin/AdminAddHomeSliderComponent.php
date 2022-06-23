<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $link;
    public $price;
    public $image;
    public $status;

    public function mount() {
        $this->status = 0;
    }

    public function updated($field) {
        $this->validateOnly($field,[
            'title' =>'required',
            'subtitle' =>'required',
            'link' =>'required',
            'price' =>'required|numeric',
            'image' =>'required|mimes:jpeg,jpg,png',
        ]);
    }
    public function addSlider() {
        $this->validate([
            'title' =>'required',
            'subtitle' =>'required',
            'link' =>'required',
            'price' =>'required|numeric',
            'image' =>'required|mimes:jpeg,jpg,png',
        ]);
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->link = $this->link;
        $slider->price = $this->price;
        $imageName = Carbon::now()->timestamp .'.'. $this->image->extension();
        $this->image->storeAs('sliders',$imageName);
        $slider->image = $imageName;
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message_success','Category Has Been Created Successfuly!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}
