@extends('layouts.mainlayout')

@section('content')
    <div class="container">

        <div class="row pt-4 justify-content-both">
            @foreach($events as $event)
                <div class="col-4 pt-5">
                    <img alt="photo" class="w-100" src="{{ $event->image }}">
                    <div class="information">
                        <div class="main-information d-flex justify-content-between align-items-baseline">
                            <a href="/event/{{ $event->event_id }}"><span class="title">{{ $event->title }}</span></a>
                            <span class="date">{{ $event->date_and_time }}</span>
                        </div>
                        <div class="place">
                            <p>{{ $event->place }}</p>
                        </div>
                        <div class="description">
                            <p>{{ $event->category }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
