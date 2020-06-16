@extends('layouts.mainlayout')

@section('content')
    @if($events->count() == 0)
        <div class="registered-event-list-wrapper">
            <div class="event-image-wrapper">
                <img src="https://img.icons8.com/cute-clipart/256/000000/info.png" alt="info">
            </div>
            <div class="event-information-wrapper">
                <div style="padding: 20px 60px">
                    <h2>You don't have registered at any event yet :(</h2>
                </div>
                <div style="padding: 10px 60px">
                    <h5>Check out all events at <a href="/home">home</a> page, or choose one from <a href="#">categories</a> list</h5>
                </div>
            </div>
        </div>
    @else
        @foreach($events as $event)
            <div class="registered-event-list-wrapper">
                <div class="event-image-wrapper">
                    <img src="http://events.final/{{ $event->image }}" alt="photo">
                </div>
                <div class="event-information-wrapper">
                    <div class="title-date-and-time-wrapper">
                        <h2><a href="../../../event/{{ $event->id }}">{{ $event->title }}</a></h2>
                        <div class="date-and-time-wrapper">
                            <p>{{ $event->date_and_time }}</p>
                        </div>
                    </div>
                    <div class="place-wrapper">
                        <h5>{{ $event->place }}</h5>
                    </div>
                    <div class="category-wrapper">
                        {{ \App\Category::find($event->category_id)->category }}
                    </div>
                    <div class="price-wrapper">
                        <h4>{{ $event->price }} €</h4>
                        <a href="http://events.final/profile/{{ auth()->user()->id }}/unregister/{{ $event->id }}"
                           class="unregister-link">Unregister</a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
