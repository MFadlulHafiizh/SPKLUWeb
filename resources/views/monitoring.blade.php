<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PZEM-004T Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>PZEM-004T Data</h2>
        <div id="pzem-data" class="mt-4"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.1/dist/echo.min.js"></script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'pusherKey' => config('broadcasting.connections.pusher.key'),
            'pusherCluster' => config('broadcasting.connections.pusher.options.cluster'),
        ]) !!};

        import Echo from 'laravel-echo';

        window.echo = new Echo({
            broadcaster: 'pusher',
            key: Laravel.pusherKey,
            cluster: Laravel.pusherCluster,
            encrypted: true,
        });

        window.echo.channel('pzem-channel')
            .listen('PzemDataReceived', (event) => {
                // Update UI with received data
                $('#pzem-data').append('<p>' + event.data + '</p>');
            });
    </script>
</body>
</html>