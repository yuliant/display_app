<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">    
    <title>{{getSetting('app_name')}}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/display.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/jquery.simplemarquee.js')}}"></script> 
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('3e25a07564c456806c95', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('disfo-channel');
        channel.bind('my-event', function(data) {
            //alert(JSON.stringify(data));
            window.location.href = '/display-screen';          
        });
    </script>       
</head>
<body> 
        @yield('content')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
