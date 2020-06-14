@extends('layouts.mainlayout')

@section('content')
    <div class="container-of-content">

        <div class="row pt-4 justify-content-both">
            @foreach($events as $event)
                <div class="col-4 pt-5">
                    <img alt="photo" class="w-100" src="{{ $event->image }}">
                    <div class="information">
                        <div class="main-information d-flex justify-content-between align-items-baseline">
                            <a href="/event/{{ $event->id }}"><span class="title">{{ $event->title }}</span></a>
                            <span class="date">{{ $event->date_and_time }}</span>
                        </div>
                        <div class="place">
                            <p>{{ $event->place }}</p>
                        </div>
                        <div class="description">
                            <p>{{ $event->category }}</p>
                            <div class="follow-button-wrapper">
                                @if(auth()->user())
                                    @if(auth()->user()->events->count() > 0)
                                        @if(auth()->user()->events->contains($event))
                                            <button class="unfollow" data-id="{{ $event->id }}">Unregister</button>
                                        @else
                                            <button class="follow" data-id="{{ $event->id }}">Register</button>
                                        @endif
                                    @else
                                        <button class="follow" data-id="{{ $event->id }}">Register</button>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
