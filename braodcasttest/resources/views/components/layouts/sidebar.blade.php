<div class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white">
    <div class="p-4">
        <h2 class="text-2xl font-semibold mb-4">Dashboard</h2>
        <nav>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('user.index') }}" class="block px-4 py-2 hover:bg-gray-700 rounded">
                        <span class="ml-2">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('roles.index') }}" class="block px-4 py-2 hover:bg-gray-700 rounded">
                        <span class="ml-2">Roles</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('products.index')}}" class="block px-4 py-2 hover:bg-gray-700 rounded">
                        <span class="ml-2">Products</span>
                    </a>
                </li>
                <!-- Add more menu items as needed -->
            </ul>
        </nav>
    </div>
</div>