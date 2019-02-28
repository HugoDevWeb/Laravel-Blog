@extends('app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ action('AdminController@postIndex') }}">Post <span
                                    class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </nav>

            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                <h1>{{ $post->title }}</h1>
                <div class="col-sm-8 blog-main">
                    <p>{{ $post->description }}</p>
                    <p><img src="{{ $post->image }}"></p>
                </div>
                <a href="{{ action('AdminController@postEdit', $post->id) }}">
                    <button type="button" class="btn btn-primary btn-sm">Edit Post</button>
                </a>
                <a href="{{ action('AdminController@destroy', $post->id) }}">
                    <button type="button" class="btn btn-danger btn-sm">Delete Post</button>
                </a>


                <h2 class="text-center mt-5">Liste des commentaires</h2>
                <table class=" table table-hover mt-5 ">

                    @if($post->validatedCom->isNotEmpty())
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Author</th>
                            <th>Comment</th>
                            <th>Created at</th>
                        </tr>
                        </thead>
                        @foreach($post->validatedCom as $comment)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>{{ Carbon\Carbon::parse($comment->created_at)->format('d-m-Y')  }}</td>
                            </tr>
                        @endforeach
                    @else
                        <p class="text-center">Il n'y a pas encore de commentaires sur ce post..</p>
                    @endif

                </table>


                <form method="post" action="{{ action('AdminController@storeComment', $post->id) }}" class="mt-5">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea class="form-control" id="id_comment" rows="3" name="comment"
                                  placeholder="Comment"></textarea>

                    </div>
                    <button type="submit" class="btn btn-primary">Create comment</button>
                    <a href="{{ action('PostController@index') }}" class="btn btn-primary">Back to posts</a>
                </form>


                <h2 class="text-center" id="h2commentaire">Commentaires à valider</h2>
                <table class="table table-hover mt-2">


                    @if($post->validateCom->isNotEmpty())
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Author</th>
                            <th>Comment</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @foreach($post->validateCom as $comment)

                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $comment->name }}</td>
                                <td class="container">{{ $comment->comment }}</td>
                                <td>{{ Carbon\Carbon::parse($comment->created_at)->format('d-m-Y')  }}</td>
                                <td><a class="btn btn-primary text-light"
                                       href="{{ action('AdminController@validateComment', [$post->id, $comment->id ]) }}">Validate
                                        this
                                        comment</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <p class="text-center">Il n'y a pas de commentaires a valider sur ce post</p>
                    @endif

                </table>
            </main>
        </div>
    </div>


@endsection