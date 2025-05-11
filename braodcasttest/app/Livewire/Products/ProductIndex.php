<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductIndex extends Component
{
    public $products;
    public function mount(){
        $this->products = Product::all();   
    }
    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        session()->flash('message', 'Product deleted successfully.');
        return redirect()->route('products.index');
    }
    public function render()
    {
        return view('livewire.products.product-index');
    }
}
