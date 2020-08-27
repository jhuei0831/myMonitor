<!DOCTYPE html>
<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('201e16222cc2044f34c0', {
        cluster: 'ap3'
        });

        var channel = pusher.subscribe('my-channel{{ Auth::user()->id }}');
        channel.bind('my-event', function(data) {
            Swal.fire({
                icon: data['icon'],
                title: data['title'],
                text: data['message'],
                footer: data['footer'],
                width: data['width'],
                timer: 5000,
            })
        });
    </script>
</head>
<body>

</body>