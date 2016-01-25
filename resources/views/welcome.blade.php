@extends('layouts.master')

@section('title', 'Welcome')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/css/video.css">
@endsection

@section('content')
    <div class="row">
        @if($categories->count() > 0)
            @if($videos->count() > 0)
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
                <div class="col-sm-3">
                    @include('partials.category_list')
                </div> <!-- .col-sm-3 -->

                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-9">
                            <h1>
                                <span class="fa-stack fa-lg" id="welcome-no-video">
                                  <i class="fa fa-video-camera fa-stack-1x"></i>
                                  <i class="fa fa-ban fa-stack-2x text-danger"></i>
                                </span>
                                No videos
                            </h1>
                        </div> <!-- .col-sm-3 -->
                    </div><!-- .row -->
                </div> <!-- .col-sm-9 -->
            @endif
        @else
            <div class="col-sm-3" id="no-video">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-video-camera fa-stack-1x"></i>
                  <i class="fa fa-ban fa-stack-2x text-danger"></i>
                </span>
            </div>
            <div class="col-sm-offset-4">
                <h1>Sorry, currently there are no YouTube videos uploaded!</h1>
                <p>Upload a video to start the learning movement.</p>
                <p><em>Thank you</em></p>
            </div>
        @endif
    </div> <!-- .row -->
@endsection
