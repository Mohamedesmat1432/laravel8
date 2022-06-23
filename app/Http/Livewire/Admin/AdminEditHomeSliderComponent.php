<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $link;
    public $price;
    public $image;
    public $status;
    public $slider_id;
    public $newimage;

    public function mount($slider_id) {
        $slider = HomeSlider::find($slider_id);
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->link = $slider->link;
        $this->price = $slider->price;
        $this->image = $slider->image;
        $this->status = $slider->status;
        $this->slider_id = $slider->id;
    }
    public function updated($field) {
        $this->validateOnly($field,[
            'title' =>'required',
            'subtitle' =>'required',
            'link' =>'required',
            'price' =>'required|numeric',
            'newimage' =>'required|mimes:jpeg,jpg,png',
        ]);
    }
    public function updateSlider() {
        $this->validate([
            'title' =>'required',
            'subtitle' =>'required',
            'link' =>'required',
            'price' =>'required|numeric',
            'newimage' =>'required|mimes:jpeg,jpg,png',
        ]);
        $slider = HomeSlider::find($this->slider_id);
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->link = $this->link;
        $slider->price = $this->price;
        if($this->newimage){
            $imageName = Carbon::now()->timestamp .'.'. $this->newimage->extension();
            $this->newimage->storeAs('sliders',$imageName);
            $slider->image = $imageName;
        }
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message_success','Slider Has Been Updated Succesfuly!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
