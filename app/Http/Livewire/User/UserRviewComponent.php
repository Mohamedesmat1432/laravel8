<?php

namespace App\Http\Livewire\User;

use App\Models\OrderItem;
use App\Models\Review;
use Livewire\Component;

class UserRviewComponent extends Component
{
    public $order_item_id;
    public $rating;
    public $comment;

    public function updated($field){
        $this->validateOnly($field,[
            'rating' => 'required',
            'comment' => 'required',
        ]);
    }
    public function mount($order_item_id){
        $this->order_item_id = $order_item_id;
    }
    public function addReview(){
        $this->validate([
            'rating' => 'required',
            'comment' => 'required',
        ]);
        $review = new Review();
        $review->rating = $this->rating;
        $review->comment = $this->comment;
        $review->order_item_id = $this->order_item_id;
        $review->save();

        $orderItem = OrderItem::find($this->order_item_id);
        $orderItem->rstatus = true;
        $orderItem->save();
        session()->flash('message','Your review has been added!');
    }
    public function render()
    {
        $orderItem = OrderItem::find($this->order_item_id);
        return view('livewire.user.user-rview-component',['orderItem'=>$orderItem])->layout('layouts.base');
    }
}
