@extends('layouts.master')

@section('title', 'Videos of a single category')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/css/video.css">
@endsection

@section('content')
    <div class="row">
        @if (isset($videos))
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
            <!-- NOT BEING DISPLAYED WHEN THERE ARE NO VIDEOS IN THIS CATEGORY -->
            <div class="col-sm-9">
                <h1>There are no videos in this category</h1>
            </div>
        @endif
    </div> <!-- .row -->
@endsection
