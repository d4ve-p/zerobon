<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class CreateProduct extends Component
{
    public $name, $price;

    protected $rules = [
        'name' => 'required|min:3',
        'price' => 'required|numeric|min:1'
    ];

    public function save()
    {
        $this->validate();

        Product::create([
            'name' => $this->name,
            'price' => $this->price
        ]);

        $this->reset(['name', 'price']);

        session()->flash('message', 'Product Successfully Added');
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
