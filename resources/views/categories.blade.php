@extends('layouts.mainlayout')

@section('content')
    <div class="container-of-content">

        <div class="row pt-4 justify-content-both">
            @foreach($categories as $category)
                <div class="col-4 pt-5">
                    <img alt="photo" class="w-100" src="http://events.final/{{ $category->image }}">
                    <div class="category">
                        <div class="catinfo">
                            <a href="/categories/{{ $category->id }}"><span class="cattitle">{{ $category->category }}</span></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .category {
            background-color: #f2f2f2;
            text-align: center;
            padding: 15px;
        }
        .cattitle {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
@endsection
