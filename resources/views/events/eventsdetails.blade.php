@extends('layouts.mainlayout')

@section('content')
    <div class="wrapper">
        <div class="row pt-2">
            <div class="leftside">
                <h1>{{ $event[0]->title }}</h1>
                <p>Created by ...</p>
                <p class="small">{{ $event[0]->category }}</p>
                <img alt="photo" class="eventimg" src="../{{ $event[0]->image }}">
                <h3 class="desc">Description</h3>
                <p>{{ $event[0]->description }}</p>
            </div>
            <div class="rightside">
                <h3>Information</h3>
                <div class="info">
                    <h4>Date and Time:</h4>
                    <p class="bottom">{{ $event[0]->date_and_time }}</p>
                    <h4>Price:</h4>
                    <p class="bottom">{{ $event[0]->price }}</p>
                    <h4>Place:</h4>
                    <p>{{ $event[0]->place }}</p>
                </div>
            </div>
        </div>
        <div>
            <h3 class="comloc">Comments</h3>
            <p class="par">Write your comment:</p>
            <div class="comments">
                <textarea name="comment" rows="5" cols="70"></textarea>
            </div>
            <button class="commentbtn" id="submit_comment">Submit</button>
        </div>
    </div>


@endsection
