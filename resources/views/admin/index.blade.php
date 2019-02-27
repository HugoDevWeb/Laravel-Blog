@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="content">
                    <div class="title m-b-md">
                        Laravel
                    </div>
                    <h1 class="mb-5 ">Bonjour admin</h1>
                    <div class="links">


                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <a href="{{ action('AdminController@postIndex') }}">Gérer les posts</a>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
