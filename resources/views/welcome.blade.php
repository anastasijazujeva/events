@extends('layouts.mainlayout')

@section('content')
    <div class="container">

        <div class="row pt-4">
            <div class="col-4">
                <img alt="photo" class="w-100" src="https://designshack.net/wp-content/uploads/1-1.jpg">
                <div class="information">
                    <div class="main-information d-flex justify-content-between align-items-baseline">
                        <a href="/details"><span class="title">Title</span></a>
                        <span class="date">20th June</span>
                    </div>
                    <div class="place">
                        <p>Where event will be</p>
                    </div>
                    <div class="description">
                        <p>Category</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <img alt="photo" class="w-100" src="https://designshack.net/wp-content/uploads/1-1.jpg">
                <div class="information">
                    <div class="main-information d-flex justify-content-between align-items-baseline">
                        <span class="title">Title</span>
                        <span class="date">20th June</span>
                    </div>
                    <div class="place">
                        <p>Where event will be</p>
                    </div>
                    <div class="description">
                        <p>Category</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <img alt="photo" class="w-100"
                     src="https://images.unsplash.com/photo-1494548162494-384bba4ab999?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80">
                <div class="information">
                    <div class="main-information d-flex justify-content-between align-items-baseline">
                        <span class="title">Title</span>
                        <span class="date">20th June</span>
                    </div>
                    <div class="place">
                        <p>Where event will be</p>
                    </div>
                    <div class="description">
                        <p>Category</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
