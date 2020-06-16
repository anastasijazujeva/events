@extends('layouts.mainlayout')

@section('content')
    <div class="container">
        <form action="/event/{{ $event->id }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-8 offset-2">

                    <div class="row">
                        <h2>Edit event</h2>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label">Title</label>

                        <input id="title"
                               type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               name="title"
                               value="{{old('title') ?? $event->title }}"
                               required autocomplete="title" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="date_and_time" class="col-md-4 col-form-label">Date and time</label>

                        <input id="date_and_time"
                               type="datetime-local"
                               class="form-control @error('date_and_time') is-invalid @enderror"
                               name="date_and_time"
                               value="{{ $event->date_and_time }}"
                               required autocomplete="date" autofocus>

                        @error('date_and_time')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="place" class="col-md-4 col-form-label">Place</label>

                        <input id="place"
                               type="text"
                               class="form-control @error('place') is-invalid @enderror"
                               name="place"
                               value="{{ $event->place }}"
                               required autocomplete="place" autofocus>

                        @error('place')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="category" class="col-md-4 col-form-label">Category</label>

                        <input id="category"
                               type="text"
                               class="form-control @error('category') is-invalid @enderror"
                               name="category"
                               value="{{ $event->category }}"
                               required autocomplete="category" autofocus>

                        @error('category')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label">Price</label>

                        <input id="price"
                               type="text"
                               class="form-control @error('price') is-invalid @enderror"
                               name="price"
                               value="{{ $event->price }}"
                               required autocomplete="price" autofocus>

                        @error('price')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label">Description</label>

                        <input id="description"
                               type="text"
                               class="form-control @error('description') is-invalid @enderror"
                               name="description"
                               value="{{ $event->description }}"
                               required autocomplete="descrpition" autofocus>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Event Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="row pt-3">
                        <button class="btn btn-primary">Update event</button>
                    </div>


                </div>
            </div>
        </form>
    </div>
@endsection
