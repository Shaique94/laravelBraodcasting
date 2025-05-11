<?php

namespace App\Livewire\Products;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class ProductCreate extends Component
{
    public $name;
    public $detail;

    public function save(){
        $this->validate([
            'name' => 'required|string|max:255',
            'detail' => 'required',
        ]);
        Product::create([
            'name' => $this->name,
            'detail' => $this->detail,
        ]);
        
        return to_route('products.index')->with('success', 'product created successfully.');

       

        session()->flash('message', 'User created successfully.');
    }
    public function render()
    {
        return view('livewire.products.product-create');
    }
}
