@extends('layouts.mainlayout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5 ">
                <img
                    src="http://events.final/{{ $user->profile->profileImage() }}"
                    style="width: 200px; height:200px" class="rounded-circle">
            </div>
            <div class="col-9 p-5">
                <div class="d-flex justify-content-between align-items-baseline">

                    <div class="d-flex align-items-center pb-3">
                        <div class="h3">
                            {{ $user->username }}
                            @if ($user->isOrganizer())
                                <p class="event-organizer-paragraph">Event organizer</p>
                            @endif
                        </div>
                    </div>
                    <div>
                        @can('update', $user->profile)
                            <a href="/profile/{{$user->id}}/edit">Edit profile</a>
                        @endcan
                    </div>
                </div>
                <div class="pt-3 font-weight-bold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><a href="{{ $user->profile->url }}">{{ $user->profile->url }}</a></div>
            </div>
        </div>
    </div>
@endsection
