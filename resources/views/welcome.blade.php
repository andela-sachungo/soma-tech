@extends('layouts.master')

@section('title', 'Welcome')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/css/video.css">
    <style>
        body {
            background: #e8edf3;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        @if (isset($videos, $categories))
            <div class="col-sm-3">
                @include('partials.category_list')
            </div> <!-- .col-sm-3 -->

            <div class="col-sm-9">
                @foreach ($videos as $video)
                    @include('partials.video_display')
                @endforeach
                {!! $videos->render() !!}
            </div> <!-- .col-sm-9 -->
        @else
            <div class="col-sm-offset-4">
                <h1>Welcome, to soma-tech!</h1>
                <p> A place to <strong><em>learn via YouTube videos</em></strong>.</p>
                <p><em>Sorry</em>, currently there are no videos uploaded.</p>
                <h3>Upload a video to start the learning movement.<em>Thank you</em>.</h3>
            </div>
        @endif
    </div> <!-- .row -->
@endsection
