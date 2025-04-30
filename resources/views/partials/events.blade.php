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

<div class="mt-3">
  {!! $events->links() !!}
</div>
