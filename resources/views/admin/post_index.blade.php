@extends('layouts.app')

@section('content')
    @if(Auth::user()->is_admin)
        <div class="container-fluid">
            <div class="row">
                <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary" href="{{ action('AdminController@postIndex') }}">Post
                                <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </nav>

                <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                    <h1>Posts</h1>
                    <a href="{{ action('AdminController@adminFormPost') }}" class="btn btn-primary mb-4 mt-3">
                        Create Post
                    </a>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Learn more</th>
                            <th>Created on</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($posts)
                            @foreach($posts as $post)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->getUser->name }}</td>
                                    <td>
                                        <a href="{{ action('AdminController@postDetail', $post->id) }}">view more</a>
                                    </td>
                                    <td>{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y')  }}</td>
                                </tr>
                        @endforeach
                        @endif
                    </table>
                    <Br>
                </main>

            </div>
        </div>
    @else
        <h2 class="text-danger text-center mt-5">Vous n'avez pas accès à cet epsace</h2>
    @endif
@endsection