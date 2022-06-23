<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sale;
use Livewire\Component;

class AdminSaleComponent extends Component
{
    public $sale_date ;
    public $status;

    public function mount() {
        $sale = Sale::find(1);
        $this->sale_date = $sale->sale_date;
        $this->status = $sale->status;

    }

    public function updateSaleDate() {
        $sale = Sale::find(1);
        $sale->sale_date = $this->sale_date;
        $sale->status = $this->status;
        $sale->save();
        session()->flash('message_success','This Is Sale Date Has Been Updated Successfuly');
    }

    public function render()
    {
        return view('livewire.admin.admin-sale-component')->layout('layouts.base');
    }
}
