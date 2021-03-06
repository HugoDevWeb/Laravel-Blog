@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ action('PostController@index') }}">Post <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </nav>

            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                <h1>Edit Post</h1>
                <div class="col-md-6">
                    <form method="post" action="#">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" id="id_title" name="title"
                                   aria-describedby="title" value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="id_description" rows="5"
                                      name="description">{{ $post->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Url image</label>
                            <input type="text" class="form-control" id="id_image" name="image"
                                   aria-describedby="image" value="{{ $post->image }}">
                        </div>
                        <button type="submit" class="btn btn-primary">update post</button>
                        <a href="{{ action('PostController@detail', $post->id) }}" class="ml-3 btn"> Annuler</a>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection