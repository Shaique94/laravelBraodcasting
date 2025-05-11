<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'My App' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased">
<div class="flex">
        <x-layouts.sidebar />
        
        <main class="flex-1 ml-64 p-6">
            {{ $slot }}
        </main>
    </div>


    @livewireScripts
</body>
</html>
