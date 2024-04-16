


@foreach($certifications as $certification)
    <p> {{ $certification->name . ": " . $certification->users_count }} </p>
    @endforeach