@extends('layout')

@section('content')
<h2>My Bookings</h2>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Event</th>
      <th>Date</th>
      <th>Venue</th>
      <th>Booked At</th>
    </tr>
  </thead>
  <tbody>
  @foreach($bookings as $booking)
    <tr>
      
      <td>{{ $booking->event->name }}</td> 
      <td>{{ $booking->event->date }}</td> 
      <td>{{ $booking->event->venue }}</td> 
      <td>{{ $booking->booking_time }}</td>
    </tr>
  @endforeach
  </tbody>
</table>
{{ $bookings->links() }}
@endsection
