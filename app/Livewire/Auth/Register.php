<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Auth;
use Hash;
use Livewire\Component;

class Register extends Component
{
    public $fullname, $username, $email, $address, $phone, $password, $confirm;

    protected $rules = [
        'fullname' => 'required|min:3',
        'username' => 'required|min:3|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'address' => '',
        'phone' => 'numeric|digits_between:10,15',
        'password' => 'required|min:6',
        'confirm' => 'required|min:6|same:password'
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'fullname' => $this->fullname,
            'username' => $this->username,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.auth.register');
    }
}
