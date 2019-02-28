@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="content">
                    <div class="title m-b-md">
                        Laravel
                    </div>
                    <div class="links">
                        
                        
                        <h1 class="mb-5">Hello {{ Auth::user()->name }}</h1>
                        <div class="links">
                            @if (Route::has('login'))
                                
                                @auth
                                    <a href="{{ action('PostController@index') }}">Post</a>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                
                                @else
                                    <a href="{{ route('login') }}">Login</a>
                                    
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                            
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
