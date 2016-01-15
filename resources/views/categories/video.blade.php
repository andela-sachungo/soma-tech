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
                <h1>There are no videos in this category</h1>
            @else
                @foreach ($videos as $video)
                    @include('partials.video_display')
                @endforeach
                {!! $videos->render() !!}
            @endif

        </div> <!-- .col-sm-9 -->
    </div> <!-- .row -->
@endsection
