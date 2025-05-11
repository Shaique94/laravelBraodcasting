<div class="p-6">
    <h1 class="text-2xl font-semibold mb-6">Show Roles</h1>

    <div>
        <a href="{{route('roles.index')}}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Back</a>
    </div>
    <div class="w-150">
        <p><strong>Name : </strong> {{ $role->name }}</p>
        <p><strong>Permissions : </strong>
            @if($role->permissions->isNotEmpty())
            {{ $role->permissions->pluck('name')->join(', ') }}
            @else
            <span class="text-gray-500">No permissions assigned</span>
            @endif
        </p>
    </div>

</div>