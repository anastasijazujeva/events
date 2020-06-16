@extends('layouts.mainlayout')

@section('content')
    @if ($event->organizator->user_id == auth()->user()->id)
        <div class="edit-button-wrapper">
            <a href="{{ $event->id }}/edit">Edit event</a>
        </div>
    @endif
    <div class="event-details-wrapper">
        <div style="display: flex; width: 1100px; margin: 0 auto; padding-top: 50px;">
            <div class="leftside">
                <h1>{{ $event->title }}</h1>
                <p>Created by <span class="creatorsize">{{ $event->organizator->username }}</span></p>
                <p class="small">{{ $event->category }}</p>
                <img alt="photo" class="eventimg" src="../{{ $event->image }}">
                <h3 class="desc">Description</h3>
                <p>{{ $event->description }}</p>
            </div>
            <div class="rightside">
                <h3>Information</h3>
                <div class="info">
                    <h4>Date and Time:</h4>
                    <p class="bottom">{{ $event->date_and_time }}</p>
                    <h4>Price:</h4>
                    <p class="bottom">{{ $event->price }}</p>
                    <h4>Place:</h4>
                    <p>{{ $event->place }}</p>
                </div>
            </div>
        </div>
        <div>
            <h3 class="comloc">Comments</h3>
            <form method="post" action="{{ route('comment.add') }}">
                @csrf
                <div style="width: 600px; margin: 0 auto;">
                    <p class="par">Write your comment:</p>
                    <div class="comments">
                        <textarea name="comment" rows="5" cols="70"></textarea>
                    </div>
                    <input name="event_id" value="{{ $event->id }}" style="display:none">
                    <button class="commentbtn" id="submit_comment">Submit</button>
                </div>
            </form>
        </div>

        @foreach($event->comment as $comment)
            <div class="comment-section-wrapper">
                <div class="comment-profile-image-wrapper">
                    <img src="http://events.final/{{$comment->user->profile->image}}" alt="profile-image">
                    <div id="comment-author-name"><h6><a href="/profile/{{ $comment->user->id }}">{{$comment->user->username}}</a></h6></div>
                </div>
                <div class="comment-text-wrapper">
                    <div style="padding: 20px 60px">
                        <p>{{ $comment->text }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
