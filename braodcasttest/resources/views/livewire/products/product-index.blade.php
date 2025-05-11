<div class="p-6">
    @session('success')
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
        role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endsession
    <h1 class="text-2xl font-semibold mb-6">Users</h1>

    <a href="{{ route('products.create') }}"
        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
        Create product
    </a>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-12">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">ID</th>
                    <th scope="col" class="py-3 px-6">Name</th>
                    <th scope="col" class="py-3 px-6">Detail</th>
                    <th scope="col" class="py-3 px-6">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="py-4 px-6">{{ $product->id }}</td>
                    <td class="py-4 px-6"> {{ $product->name }} </td>
                    <td class="py-4 px-6">{{ $product->detail }}</td>
                    <td class="py-4 px-6 flex space-x-2">
                    <a href="{{ route('products.show', $product->id) }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Show
                        </a>
                        <a href="{{ route('products.edit', $product->id) }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Edit
                        </a>
                        <button wire:click="delete({{ $product->id }})"
                            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>