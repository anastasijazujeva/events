@extends('layouts.mainlayout')

@section('content')
    <div style="padding-top: 20px;">
        <h2 style="text-align: center;">Add new category</h2>
    </div>
    <div style="width: 500px; margin: 0 auto;">
        <form method="POST" action="/categories" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="" class="col-md-4 col-form-label">Category</label>

                <input id="category"
                       type="text"
                       class="form-control @error('category') is-invalid @enderror"
                       name="category"
                       value="{{ old('category')}}"
                       required autocomplete="category" autofocus
                       style>

                @error('category')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <label for="image" class="col-md-4 col-form-label">Category Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @error('image')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row pt-3">
                <button class="btn btn-primary">Add category</button>
            </div>
        </form>
    </div>
    @if(session()->has('message'))
        <div style="width: 600px; margin: 0 auto; padding-top: 20px">
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        </div>
    @endif
@endsection
