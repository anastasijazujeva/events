@extends('layouts.mainlayout')

@section('content')
    <div class="row pt-4">
        <div class="leftside">
            <p class="small">{{ $event[0]->category }}</p>
            <h1>{{ $event[0]->title }}</h1>
            <p>Created by ...</p>
            <img alt="photo" class="eventimg" src="../{{ $event[0]->image }}">
            <h3 class="desc">Description</h3>
            <p>{{ $event[0]->description }}</p>
        </div>
        <div class="rightside">
            <div class="info">
                <h3>Information</h3>
                <h4>Date and Time:</h4>
                <p>{{ $event[0]->date_and_time }}</p>
                <h4>Price:</h4>
                <p>{{ $event[0]->price }}</p>
                <h4>Place:</h4>
                <p>{{ $event[0]->place }}</p>
            </div>
        </div>
    </div>


    <style>
        .eventimg {
            width: 600px;
        }
        .small {
            size: 20px;
            margin-bottom: -5px;
        }
        .desc {
            margin-top: 10px;
        }
        .leftside {
            margin-left: 50px;
        }

        .rightside {
            margin-top: 170px;
            margin-left: 100px;
        }
    </style>
@endsection
