@extends('layouts.mainlayout')

@section('content')
    <a href="/home" class="back">Back to home</a>
    @if($events->count() == 0)
        <div class="registered-event-list-wrapper">
            <div class="event-image-wrapper">
                <img src="https://img.icons8.com/cute-clipart/256/000000/info.png" alt="info">
            </div>
            <div class="event-information-wrapper">
                <div style="padding: 20px 60px">
                    <h2>You don't have created any event yet </h2>
                </div>
                <div style="padding: 10px 60px">
                    <a href="/event/new/create">Create new event</a>
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
                        <div class="edit-delete-icons-wrapper">
                            <a href="/event/{{ $event->id }}/edit"><img
                                    src="https://img.icons8.com/cotton/64/000000/edit.png" alt="edit-icon"></a>
                            <a href="/event/{{ $event->id }}/delete"><img
                                    src="https://img.icons8.com/color/48/000000/delete.png" alt="delete-icon"></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
