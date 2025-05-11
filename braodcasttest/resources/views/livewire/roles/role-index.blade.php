<div class="p-6">
    @session('success')
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
        role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endsession
    <h1 class="text-2xl font-semibold mb-6">Roles</h1>

    <a href="{{ route('roles.create') }}"
        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
        Create Roles
    </a>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-12">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">ID</th>
                    <th scope="col" class="py-3 px-6">Name</th>
                    <th scope="col" class="py-3 px-6">Permissions</th>
                    <th scope="col" class="py-3 px-6">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="py-4 px-6">{{ $role->id }}</td>
                    <td class="py-4 px-6"> {{ $role->name }} </td>
                    <td class="py-4 px-6">
                @if($role->permissions->isNotEmpty())
                    {{ $role->permissions->pluck('name')->join(', ') }}
                @else
                    <span class="text-gray-500">No permissions assigned</span>
                @endif
            </td>
            <td class="py-4 px-6 flex space-x-2">
                <a href="{{ route('roles.show', $role->id) }}"
                   class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Show
                </a>
                <a href="{{ route('roles.edit', $role->id) }}"
                   class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Edit
                </a>
                <button wire:click="delete({{ $role->id }})"
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