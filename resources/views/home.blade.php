@extends('layouts.mainlayout')

@section('content')
    <div class="container">

        <div class="row pt-4">
            @foreach($events as $event)
            <div class="col-4">
                <img alt="photo" class="w-100" src="https://designshack.net/wp-content/uploads/1-1.jpg">
                <div class="information">
                    <div class="main-information d-flex justify-content-between align-items-baseline">
                        <span class="title">{{ $event->title }}</span>
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
