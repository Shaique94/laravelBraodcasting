<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>

<body>
    <button
        onclick="sendBroadcast()"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Button
    </button>

    <script>
        function sendBroadcast() {
            fetch("{{ route('button.clicked') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        message: "Button was clicked!"
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log("Broadcasted:", data);
                })
                .catch(error => {
                    console.error("Error broadcasting:", error);
                });
        }
    </script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-echo/dist/echo.iife.js"></script>

<script>
    window.Pusher = Pusher;
// console.log("Pusher activated");
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: '{{ env("PUSHER_APP_KEY") }}',
        cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
        forceTLS: true
    });

    Echo.channel('button-clicked')
        .listen('ButtonClickedEvent', (e) => {
            console.log("Received message:", e.message);
            alert("Received message: " + e.message);
        });
</script>
</body>


</html>