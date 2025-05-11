<div class="p-6">
    @session('success')
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
        role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endsession
    <h1 class="text-2xl font-semibold mb-6">Users</h1>

    <a href="{{ route('user.create') }}"
        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
        User
    </a>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-12">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">ID</th>
                    <th scope="col" class="py-3 px-6">Name</th>
                    <th scope="col" class="py-3 px-6">Email</th>
                    <th scope="col" class="py-3 px-6">Roles</th>
                    <th scope="col" class="py-3 px-6">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="py-4 px-6">{{ $user->id }}</td>
                    <td class="py-4 px-6"> {{ $user->name }} </td>
                    <td class="py-4 px-6">{{ $user->email }}</td>
                    <td class="py-4 px-6">
                        @if($user->roles->isNotEmpty())
                            {{ $user->roles->pluck('name')->join(', ') }}
                        @else
                            <span class="text-gray-500">No roles assigned</span>
                        @endif
                       
                    </td>

                    <td class="py-4 px-6 flex space-x-2">
                        <a href="{{ route('user.show', $user->id) }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Show
                        </a>
                        <a href="{{ route('user.edit', $user->id) }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Edit
                        </a>
                        <button wire:click="delete({{ $user->id }})"
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