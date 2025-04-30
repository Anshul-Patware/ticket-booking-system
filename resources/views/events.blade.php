@extends('layout')

@section('content')
<h2>Available Events</h2>
<div class="row">
  @forelse($events as $event)
    <div class="col-md-4 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $event->name }}</h5>
          <p>Date: {{ $event->date }}</p>
          <p>Venue: {{ $event->venue }}</p>
          <p>Seats Left: {{ $event->available_seats }}</p>
          <button class="btn btn-success book-btn" data-id="{{ $event->id }}">Book Ticket</button>
        </div>
      </div>
    </div>
  @empty
    <div class="col-12">
      <p>No events available.</p>
    </div>
  @endforelse
</div>

<script>
document.querySelectorAll('.book-btn').forEach(btn => {
  btn.onclick = function() {
    fetch('/book-ticket', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
      },
      body: JSON.stringify({ event_id: this.dataset.id })
    })
    .then(res => res.json())
    .then(data => alert(data.success || data.error));
  }
});
</script>
@endsection
