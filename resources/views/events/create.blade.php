@extends('layouts.mainlayout')

@section('content')
    <div class="container">
        <form action="/event" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-8 offset-2">

                    <div class="row">
                        <h2>Create event</h2>
                    </div>
                    <span class="errormsg">* Reqired fields</span>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label">Title <span class="error">*</span></label>

                        <input id="title"
                               type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               name="title"
                               required autocomplete="title" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="date_and_time" class="col-md-4 col-form-label">Date and time <span class="error">*</span><span class="smalldate">(YYYY-MM-DD)</span></label>

                        <input id="date_and_time"
                               type="datetime-local"
                               value="2020-01-01 00:00"
                               class="form-control @error('date_and_time') is-invalid @enderror"
                               name="date_and_time"
                               required autocomplete="date"
                               autofocus>

                        @error('date_and_time')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="place" class="col-md-4 col-form-label">Place <span class="error">*</span></label>

                        <input id="place"
                               type="text"
                               class="form-control @error('place') is-invalid @enderror"
                               name="place"
                               required autocomplete="place" autofocus>

                        @error('place')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="category" class="col-md-4 col-form-label">Category <span class="error">*</span></label>

                        <select id="category" class="form-control @error('category') is-invalid @enderror" name="category" required autocomplete="category" autofocus>
                            @foreach(App\Category::all() as $category)
                                <option>{{ $category->category }}</option>
                            @endforeach
                        </select>

                        @error('category')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label">Price <span class="error">*</span></label>

                        <input id="price"
                               type="text"
                               class="form-control @error('price') is-invalid @enderror"
                               name="price"
                               required autocomplete="price" autofocus>

                        @error('price')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label">Description <span class="error">*</span></label>

                        <input id="description"
                               type="text"
                               class="form-control @error('description') is-invalid @enderror"
                               name="description"
                               required autocomplete="descrpition" autofocus>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Event Image <span class="error">*</span></label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="row pt-3">
                        <button class="btn btn-primary">Create event</button>
                    </div>


                </div>
            </div>
        </form>
    </div>

    <style>
        .errormsg {
            font-size: 15px;
            margin-left: -11px;
            color: #AAAAAA;
        }

        .error {
            color: #AAAAAA;
        }

        .smalldate {
            font-size: 12px;
        }
    </style>
@endsection
