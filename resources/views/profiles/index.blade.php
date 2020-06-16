@extends('layouts.mainlayout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5 ">
                <img
                    src="http://events.final/{{ $user->profile->profileImage() }}"
                    style="width: 250px; height:250px" class="rounded-circle">
            </div>
            <div style="padding: 80px 100px;">
                <div class="d-flex justify-content-between align-items-baseline">

                    <div class="d-flex align-items-center pb-3">
                        <div class="h3">
                            {{ $user->username }}
                            @if ($user->isOrganizer())
                                <p class="event-organizer-paragraph">Event organizer</p>
                            @endif
                        </div>
                    </div>
                    <div style="position: relative; left: 500px;">
                        @can('update', $user->profile)
                            <a href="/profile/{{$user->id}}/edit">Edit profile</a>
                        @endcan
                    </div>
                </div>
                <div>{{ $user->profile->description }}</div>
                <div><a href="{{ $user->profile->url }}">{{ $user->profile->url }}</a></div>
            </div>
        </div>
    </div>
    @if ($user->isOrganizer())
        @if($user->organizator->events->count() > 0)
            <div class="organized-events-wrapper">
                <h2 style="text-align: center">Created events by user:</h2>
                @foreach($user->organizator->events as $event)
                    <div class="registered-event-list-wrapper">
                        <div class="event-image-wrapper">
                            <img src="http://events.final/{{ $event->image }}" alt="photo">
                        </div>
                        <div class="event-information-wrapper">
                            <div class="title-date-and-time-wrapper">
                                <h2>{{ $event->title }}</h2>
                                <div class="date-and-time-wrapper">
                                    <p>{{ $event->date_and_time }}</p>
                                </div>
                            </div>
                            <div class="place-wrapper">
                                <h5>{{ $event->place }}</h5>
                            </div>
                            <div class="category-wrapper">
                                {{ $event->category }}
                            </div>
                            <div class="price-wrapper">
                                <h4>{{ $event->price }} €</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                    <h2 style="text-align: center">No created events by user yet</h2>
                @endif
            </div>
            @else
            <h2 style="text-align: center">Events user registered for:</h2>
            @foreach($user->events as $event)
                <div class="registered-event-list-wrapper">
                    <div class="event-image-wrapper">
                        <img src="http://events.final/{{ $event->image }}" alt="photo">
                    </div>
                    <div class="event-information-wrapper">
                        <div class="title-date-and-time-wrapper">
                            <h2>{{ $event->title }}</h2>
                            <div class="date-and-time-wrapper">
                                <p>{{ $event->date_and_time }}</p>
                            </div>
                        </div>
                        <div class="place-wrapper">
                            <h5>{{ $event->place }}</h5>
                        </div>
                        <div class="category-wrapper">
                            {{ $event->category }}
                        </div>
                        <div class="price-wrapper">
                            <h4>{{ $event->price }} €</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
@endsection
