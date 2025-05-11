<div class="p-6">
    <h1 class="text-2xl font-semibold mb-6">Edit Roles</h1>

    <div>
        <a href="{{route('roles.index')}}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Back</a>
    </div>
    
    <form wire:submit.prevent="save" class="mt-6 space-y-4 max-w-md">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" wire:model="name" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Permissions</label>
            <div class="space-y-2">
                @foreach($allPermissions as $permission)
                    <div class="flex items-center">
                        <input type="checkbox" 
                            id="permission_{{ $permission->id }}"
                            wire:model="permissions" 
                            value="{{ $permission->id }}"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="permission_{{ $permission->id }}" 
                            class="ml-2 block text-sm text-gray-900">
                            {{ $permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            @error('selectedPermissions') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <button type="submit" 
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Permit
            </button>
        </div>
    </form>
</div>