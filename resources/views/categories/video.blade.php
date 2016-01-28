@extends('layouts.master')

@section('title', 'Videos of a single category')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/css/video.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-3">
            @include('partials.category_list')
        </div> <!-- .col-sm-3 -->

        <div class="col-sm-9">
            @if ($videos->count() === 0)
                <div class="row">
                    <div class="col-sm-12">
                        <h2>
                            <span class="fa-stack fa-lg" id="single-no-video">
                              <i class="fa fa-video-camera fa-stack-1x"></i>
                              <i class="fa fa-ban fa-stack-2x text-danger"></i>
                            </span>
                            There are no videos in this category
                        </h2>
                    </div>
                </div>
            @else
                @foreach ($videos as $video)
                    @include('partials.video_display')
                @endforeach
                {!! $videos->render() !!}
            @endif

        </div> <!-- .col-sm-9 -->
    </div> <!-- .row -->
@endsection
