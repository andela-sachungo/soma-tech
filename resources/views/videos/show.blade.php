@extends('layouts.master')

@section('title', 'Show a video')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/css/video.css">
@endsection

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-sm-offset-2 col-sm-8">
                <h4 id="video-title">{{ $video->title }}</h4>
                <hr>
                <div class="thumbnail box-shadow" id="single-video">
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="{{ $video->youtube_link }}" allowfullscreen></iframe>
                    </div> <!-- .embed-responsive -->
                    <div class="caption vid-thumbnail" id="align">
                        <p id="description"> {{ $video->description }}</p>
                        <br>
                        <label><h5>Category:</h5></label><span>{{ $category->title }}</span>
                        @can('userVideo', $video)
                            <div class="row" id="button-caption">
                                <div class="col-sm-2">
                                    <a href="{{ route('homepage') }}" class="btn btn-md btn-default">Homepage</a>
                                </div>
                                <div class="col-sm-1" style="margin-left:50px; margin-right:15px">
                                    <a href="{{ route('video.edit', $video->id) }}" class="btn btn-md btn-info btn-shape">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </div>
                                <div class="col-sm-1" style="margin-right:15px">
                                    <!-- Form to send a HTTP DELETE request -->
                                    {!! Form::open(array('route' => array('video.destroy', $video->id), 'method' => 'delete')) !!}
                                        <button type="submit" class = "btn btn-md btn-default btn-shape"><i class="fa fa-trash"></i></button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @endcan
                    </div> <!-- .caption -->
                </div> <!-- .thumbnail -->
            </div> <!-- .col-sm-offset-2 -->
        </div> <!-- .container -->
    </div> <!-- .row -->
@endsection
