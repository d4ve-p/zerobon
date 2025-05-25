<?php

namespace App\Livewire\Auth;
use Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{
    // Account is either username or email
    public $account, $password;
    public $remember = false;


    protected $rules = [
        'account' => 'required|string',
        'password' => 'required|string',
        'remember' => 'boolean'
    ];

    public function login()
    {
        $validatedData = $this->validate();

        // Try to login with either username, or email
        $credentialsWithEmail = [
            'email' => $validatedData['account'],
            'password' => $validatedData['password']
        ];

        $credentialsWithUsername = [
            'username' => $validatedData['account'],
            'password' => $validatedData['password']
        ];

        if (Auth::attempt($credentialsWithEmail, $this->remember) || Auth::attempt($credentialsWithUsername, $this->remember)) {
            request()->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        throw ValidationException::withMessages([
            'account' => [__('auth.failed')]
        ]);
       
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
