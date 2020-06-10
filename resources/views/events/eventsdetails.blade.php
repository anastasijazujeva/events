@extends('layouts.mainlayout')

@section('content')
    <div class="wrapper">
        <div class="row pt-2">
            <div class="leftside">
                <p class="small">{{ $event[0]->category }}</p>
                <h1>{{ $event[0]->title }}</h1>
                <p>Created by ...</p>
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



    <style>
        .eventimg {
            width: 600px;
        }

        .small {
            font-size: 14px;
            margin-bottom: -5px;
        }

        .desc {
            margin-top: 10px;
        }

        .leftside {
            margin-left: 50px;
        }

        .info {
            border-style: solid;
            border-width: 1px;
            background: #f6f6f6;
            padding: 15px;
        }

        .bottom {
            border-bottom-style: solid;
            border-width: 1px;
        }

        .rightside {
            margin-top: 125px;
            margin-left: 210px;
        }

        .comloc {
            text-align: center;
        }

        .par {
            font-size: 14px;
            margin-left: 310px;
            margin-bottom: -2px;
        }

        .commentbtn {
            color: white;
            background-color: black;
            border: none;
            padding: 10px;
            margin-left: 309px;
            margin-top: -20px;
            margin-bottom: 30px;
        }

        .comments {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
@endsection
