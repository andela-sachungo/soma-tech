@extends('layouts.master')

@section('title', 'Show a video')

@section('content')
    <div class="row">
        <div class="col-sm-6 vid">
            <!-- 16:9 aspect ratio -->
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="{{ $video->youtube_link }}"></iframe>
            </div>
            <h3>{{ $video->title }}</h3>
            <h6>{{ substr($video->created_at, 0, 10) }}</h6>
            <p> {{ $video->description }}</p>
        </div>
    </div>
@endsection

@section('styles')
    <style type="text/css">
        .vid {
            background-color: white;
            margin-bottom: 30px;
            border-style:hidden;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14),0 3px 1px -2px rgba(0, 0, 0, .2), 0 1px 5px 0 rgba(0, 0, 0, .12);
        }
        .vid h3 {
            padding-left: 15px;
            padding-right: 15px;
            padding-top: 15px;
            padding-bottom: 2px;
            margin: 0px;
        }
        .vid h6 {
            opacity: 0.7;
            padding-left: 15px;
            padding-right: 15px;
            padding-bottom: 10px;
        }

        .vid p {
            padding-left: 15px;
            padding-right: 15px;
            padding-bottom: 15px;
        }
    </style>
@endsection