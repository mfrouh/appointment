<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('969a23f46224c19239b4', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data['appointment']['code']));
    });
  </script>
</head>
<body>
  <h1 class="text-center">Appointment</h1>
  <p>
      Appointment
  </p>
</body>
