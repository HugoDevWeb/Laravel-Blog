@extends('layouts.app')

@section('content')
    @if(Auth::user()->is_admin)
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
    @else
        <h2 class="text-danger text-center mt-5">Vous n'avez pas accès à cet epsace</h2>
    @endif


@endsection()
