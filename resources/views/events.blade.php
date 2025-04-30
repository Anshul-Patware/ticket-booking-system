@extends('layout')

@section('content')
<h2>Available Events</h2>
<div id="events-wrapper">
  @include('partials.events', ['events' => $events])
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    loadHandlers();

    function loadHandlers() {
        
        document.querySelectorAll('.book-btn').forEach(btn => {
            btn.onclick = function () {
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
            };
        });

      
        document.querySelectorAll('.pagination a').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                fetch(this.href, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('events-wrapper').innerHTML = html;
                    loadHandlers(); 
                });
            });
        });
    }
});
</script>
@endsection
