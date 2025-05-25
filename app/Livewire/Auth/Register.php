<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Auth;
use Hash;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $password;

    protected $rules = [
        'fullname' => 'required|min:3|unique:users,fullname',
        'username' => 'required|min:3|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'address' => 'required',
        'phone' => 'required|numeric|digits_between:10,15',
        'password' => 'required|min:6',
        'confirm' => 'required|min:6'
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }
    public function render()
    {
        return view('livewire.auth.register');
    }
}
