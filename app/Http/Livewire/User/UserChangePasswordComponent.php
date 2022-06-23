<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserChangePasswordComponent extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function updated($field){
        $this->validateOnly($field,[
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password',
        ]);
    }
    public function changePassword(){
        $this->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password',
        ]);
        if(Hash::check($this->current_password,Auth::user()->password)){
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->save();
            session()->flash('message_success','Password has been updated successfuly!');
        }
        else{
            session()->flash('message_error','Password does not update!');
        }
    }
    public function render()
    {
        return view('livewire.user.user-change-password-component')->layout('layouts.base');
    }
}
