@extends('layouts.app')

@section('content')
    @if(Auth::user()->is_admin)
    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2  d-sm-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ action('AdminController@postIndex') }}">Post <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </nav>

            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                <h1>Create Post</h1>
                <div class="col-md-4">
                    <form method="post" action="{{ action('AdminController@adminStoreFormPost') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" id="id_title" name="title"
                                   aria-describedby="title" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="id_description" rows="3" name="description"
                                      placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Url de l'image</label>
                            <input type="text" class="form-control" id="id_image" name="image"
                                   aria-describedby="image" placeholder="Please enter your url's picture">

                        </div>
                        <button type="submit" class="btn btn-primary">Create post</button>
                        <a href="{{ action('AdminController@postIndex') }}" class="btn btn-primary">Back to posts</a>
                    </form>
                </div>
            </main>
        </div>
    </div>
    @else
        <h2 class="text-danger text-center mt-5">Vous n'avez pas accès à cet epsace</h2>
    @endif
@endsection