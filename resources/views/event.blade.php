<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
</head>
<body>
<h1>All Events</h1>

@if($events->count())
    <ul>
        @foreach($events as $event)
            <li>
                <h2>{{ $event->Title }}</h2>
                <p>{{ $event->Content }}</p>
                @if(!empty($event->key_people))
                    <p><strong>Key People:</strong></p>
                    <ul>
                        @foreach($event->key_people as $person)
                            <li>{{ is_array($person) ? ($person['name'] ?? 'Unknown') : $person }}</li>
                        @endforeach
                    </ul>
                @endif
                <p>Location: {{ $event->Location }}</p>
                <p>Starts: {{ $event->StartTime->format('M d, Y h:i A') }}</p>
                <p>Ends: {{ $event->EndTime->format('M d, Y h:i A') }}</p>

                @if($event->image_path)
                    <img src="{{ asset('storage/' . $event->image_path) }}" alt="Event Image" style="max-width: 300px;">
                @endif
            </li>
        @endforeach
    </ul>
@else
    <p>No events found.</p>
@endif
</body>
</html>
