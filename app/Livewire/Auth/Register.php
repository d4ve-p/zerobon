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
        'name' => 'required|min:3|unique:users,name',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6'
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
