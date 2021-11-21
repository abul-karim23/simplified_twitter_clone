@extends('layouts.app')

@section('content')

        <div class="row bg-color" >
            <!-- col 1 -->
            <div class="col bg-fill" >
                <img src="{{asset('images/twitter_bg.jpg')}}"  alt="Twitter logo">
            </div>

        <!-- col 2 -->
            <div class="col mt-5">

                <div class="d-flex justify-content-center"><img src="{{asset('images/twitter_logo.png')}}" class="" alt="Twitter logo">
                </div>                         

           <!-- <div class="flex-center position-ref full-height"> -->

           <div class="container">
            <div class="jumbotron mt-5">
                <h1 class="display-4">Twitter Clone</h1>
                <p class="lead">This is a simplified version of twitter. Join today.</p>
                <hr class="my-4">
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Sign Up</a>
                    &nbsp;&nbsp;
                    <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Login</a>
                </p>
            </div>  
            </div>

            </div>
        
        </div> 

@endsection
