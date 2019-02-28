@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2  d-sm-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ action('PostController@index') }}">Post <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </nav>

            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                <h1>Create Post</h1>
                <div class="col-md-4">
                    <form method="post" action="{{ action('PostController@storeFormPost') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''  }}" id="id_title" name="title"
                                   aria-describedby="title" placeholder="Enter title" value="{{ old('title') }}">
                            {!! $errors->first('title', '<span class="invalid-feedback">:message</span>')  !!}
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : ''  }}" id="id_description" rows="3" name="description"
                                      placeholder="Description">{{ old('description') }}</textarea>
                            {!! $errors->first('description', '<span class="invalid-feedback">:message</span>')  !!}
                        </div>
                        <div class="form-group">
                            <lable for="image">Url de l'image</lable>
                            <input type="text" class="form-control {{ $errors->has('image') ? 'is-invalid' : ''  }}" id="id_image" name="image"
                                   aria-describedby="image" placeholder="Please enter your url's picture" value="{{ old('image') }}">
                            {!! $errors->first('image', '<span class="invalid-feedback">:message</span>')  !!}

                        </div>
                        <button type="submit" class="btn btn-primary">Create post</button>
                        <a href="{{ action('PostController@index') }}" class="btn btn-primary">Back to posts</a>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection