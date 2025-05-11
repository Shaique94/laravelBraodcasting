<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductEdit extends Component
{
    public $product,$name,$detail;
    public function mount($id)
    {
        $this->product = Product::find($id);
      
        $this->name = $this->product->name;
        $this->detail = $this->product->detail;
    }

    public function save(){
        $this->validate([
            'name' => 'required|string|max:255',
            'detail' => 'required',
        ]);
        $this->product->update([
            'name' => $this->name,
            'detail' => $this->detail,
        ]);
        
        return to_route('products.index')->with('success', 'product updated successfully.');

    }

    public function render()
    {
        return view('livewire.products.product-edit');
    }
}
