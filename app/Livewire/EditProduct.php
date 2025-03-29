<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Null_;

class EditProduct extends Component
{
    public $productId;
    public $product;

    public $name, $price;

    protected $rules = [
        'name' => 'required|min:3',
        'price' => 'required|numeric|min:1'
    ];

    public function mount($productId) {
        $this->productId = $productId;
        $this->product = Product::findOrFail($this->productId);
    }

    public function edit()
    {
        $this->validate();

        $product = Product::findOrFail($this->productId);
        $product->update([
            'name' => $this->name,
            'price' => $this->price
        ]);

        session()->flash('message', 'Product updated successfully!');
    }

    public function delete()
    {
        return redirect()->route('delete-product', $this->productId);
    }

    public function render()
    {
        $this->name = $this->product->name;
        $this->price = $this->product->price;

        return view('livewire.edit-product', ['product' => $this->product]);
    }
}
