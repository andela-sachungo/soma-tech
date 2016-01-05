@extends('layouts.master')

@section('title', 'Welcome')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/css/video.css">
    <style>
        body {
            background: #e8edf3;
        }

        .thumbnail {
            padding: 0;
        }

        .caption {
            background-color:rgba(0,0,0,0.7);
        }

        #list-scrollable {
            height: 500px;
            overflow: auto;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        @if (isset($videos, $categories))
            <div class="col-sm-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Categories</h3>
                    </div>
                    <div class="list-group" id="list-scrollable">
                        @foreach ($categories as $category)
                            <a href = "#" class="list-group-item">{{ $category->title }}</a>
                        @endforeach
                    </div>
                </div> <!-- .panel panel-info -->
            </div> <!-- .col-sm-2 -->

            <div class="col-sm-9">
                @foreach ($videos as $video)
                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <!-- 16:9 aspect ratio -->
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $video->youtube_link }}"></iframe>
                            </div> <!-- .embed-responsive -->
                            <div class="caption vid-thumbnail" id="align">
                                <h4>{{ $video->title }}</h4>
                                <h6>{{ substr($video->created_at, 0, 10) }}</h6>
                                <p id="desc"> {{ $video->description }}</p>
                                <a href="#" class="btn btn-default btn-md pull-right">More Info</a>
                                @can('userVideo', $video)
                                    <a href="{{ route('video.edit', $video->id) }}" class="btn btn-md btn-info btn-shape">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('video.destroy', $video->id) }}" class="btn btn-md btn-default btn-shape">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                @endcan
                            </div> <!-- .caption -->
                        </div> <!-- .thumbnail -->
                    </div> <!-- .col-sm-3 -->
                @endforeach
                {!! $videos->render() !!}
            </div> <!-- .col-sm-9 -->
        @else
            <h1>Welcome, to soma-tech!</h1>
            <p> A place to <strong><em>learn via YouTube videos</em></strong>.</p>
            <p><em>Sorry</em>, currently there is no videos uploaded.</p>
            <h3>Upload a video to start the learning movement.<em>Thank you</em>.</h3>
        @endif
    </div> <!-- .row -->
@endsection
