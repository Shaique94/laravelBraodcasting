<div class="p-6">
    <h1 class="text-2xl font-semibold mb-6">Show Users</h1>

    <div>
        <a href="{{route('products.index')}}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Back</a>
    </div>
    <div class="w-150">
        <p><strong>Name : </strong> {{ $product->name }}</p>
        <p><strong>Email : </strong> {{ $product->detail }}</p>
    </div>
   
