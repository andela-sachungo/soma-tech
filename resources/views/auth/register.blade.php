@extends('layouts.master')

@section('title', 'Register')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/css/soma.css">
    <link rel="stylesheet" type="text/css" href="/css/other.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            <form role="form" class="col s12" method="POST" action="{{ route('register') }}">
                {!! csrf_field() !!}
                @include('partials.error')

                <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Full name</label>
                    <input class="form-control" name = "name" id="name" type="text" value="{{ old('name') }}">
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Email</label>
                    <input class="form-control" name = "email" id="email" type="email" value="{{ old('email') }}">
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Password</label>
                    <input class="form-control" name = "password" id="password" type="password">
                </div>
                <div class="form-group{{ $errors->has('confirm-password') ? ' has-error' : '' }}">
                    <label for="confirm-password" class="control-label">Confirm Password</label>
                    <input class="form-control" name = "confirm-password" id="confirm-password" type="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            <hr>
            <h5>Alternatively...</h5>
            <ul class="social">
                <li><a href="{{ route('social.auth', ['github']) }}"><i class="fa fa-github"></i></a></li>
                <span></span>
                <li><a href="{{ route('social.auth', ['google']) }}"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
    </div>
@endsection
