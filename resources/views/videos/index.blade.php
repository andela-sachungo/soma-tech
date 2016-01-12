@extends('layouts.master')

@section('title', 'My videos')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/css/video.css">
@endsection

@section('content')
    <div class="row">
        @include('partials.sidebar')

        <div class="col-sm-10">
            @foreach ($videos as $video)
                @include('partials.video_display')
            @endforeach
            {!! $videos->render() !!}
        </div> <!-- .col-sm-10 -->
    </div> <!--end .row -->
@endsection
