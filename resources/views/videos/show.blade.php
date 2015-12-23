@extends('layouts.master')

@section('title', 'Show a video')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/css/video.css">
@endsection

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
