@extends('layouts.mainlayout')

@section('content')
    <div class="row pt-4">
        <div class="leftside">
            <p class="small">Category</p>
            <h1>Title</h1>
            <p>Created by ...</p>
            <img alt="photo" class="eventimg" src="https://shapingthefuture.ch/wp-content/uploads/2020/01/Party.jpg">
            <h3 class="desc">Description</h3>
            <p>Bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla</p>
        </div>
        <div class="rightside">
            <div class="info">
                <h3>Information</h3>
                <h4>Date and Time:</h4>
                <p>date and time</p>
                <h4>Price:</h4>
                <p>price</p>
                <h4>Place:</h4>
                <p>place</p>
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
