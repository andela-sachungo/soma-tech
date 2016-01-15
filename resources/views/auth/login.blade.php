@extends('layouts.master')

@section('title', 'Login')

@section('content')
   <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            <form  method="POST" action="{{ route('login') }}">
                {!! csrf_field() !!}
                @include('partials.error')

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Email</label>
                    <input class="form-control" name = "email" id="email" type="email" value="{{ old('email') }}">
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Password</label>
                    <input class="form-control" name = "password" id="password" type="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Log In</button>
                </div>
            </form>
        </div>
    </div> <!-- .row -->
    <div class="row">
        <div class=" col-sm-offset-3 col-sm-6">
            <hr>
            <h5>Alternatively...</h5>
            <ul class="social">
                <li><a href="{{ route('social.auth', ['github']) }}"><i class="fa fa-github"></i></a></li>
                <li><a href="{{ route('social.auth', ['google']) }}"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
    </div> <!-- .row -->
@endsection

@section('styles')
    <style type="text/css">
        button {
            margin-top: 20px;
        }
    </style>
@endsection