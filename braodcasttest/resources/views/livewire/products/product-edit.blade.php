<div class="p-6">
    <h1 class="text-2xl font-semibold mb-6">Users edit</h1>

    <div>
        <a href="{{route('user.index')}}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Back</a>
    </div>
    
    <form wire:submit.prevent="save" class="mt-6 space-y-4 max-w-md">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" wire:model="name" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="detail" class="block text-sm font-medium text-gray-700">detail</label>
            <input  id="detail" wire:model="detail" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('detail') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

       

        <div>
            <button type="submit" 
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                save Product
            </button>
        </div>
    </form>
</div>