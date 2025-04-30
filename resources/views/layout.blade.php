<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>{{ $title ?? 'Ticket Booking' }}</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="/events">TicketSys</a>
      <div>
        @if(session()->has('user'))
          <a class="btn btn-outline-light" href="/my-bookings">My Bookings</a>
          <a class="btn btn-outline-light ms-2" href="/logout">Logout</a>
        @else
          <a class="btn btn-outline-light" href="/login">Login</a>
        @endif
      </div>
    </div>
  </nav>

  <div class="container">
    @yield('content')
  </div>


  @yield('scripts')

</body>
</html>
