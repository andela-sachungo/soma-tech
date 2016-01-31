@extends('layouts.master')

@section('title', 'Show a video')

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/css/video.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-3">
            @include('partials.category_list')
        </div> <!-- .col-sm-3 -->

        <div class="col-sm-9">
            <div class="thumbnail box-shadow">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="player"
                    class="embed-responsive-item"
                    src="{{ $video->youtube_link }}?enablejsapi=1&origin=http://soma-tech.herokuapp.com"
                    allowfullscreen></iframe>
                </div> <!-- .embed-responsive -->
                <div class="caption vid-thumbnail" id="align">
                    <div class="row">
                        <div class="col-sm-9">
                            <h4 id="video-title">{{ $video->title }}</h4>
                            <p id="description"> {{ $video->description }}</p>
                            <label><h5>{{ $video->category->title }} Category</h5></label>
                        </div> <!-- .col-sm-9 -->
                        <div class="col-sm-3" id="details">
                            <h5>
                                <span><i class="fa fa-user"></i></span>
                                By {{ $video->userDirect->name }}
                            </h5>
                            <p>{{ date("M d, Y", strtotime(substr($video->created_at, 0, 10))) }}</p>
                            <h5 id="count">{{ $video->play }} Views</h5>
                        </div> <!-- .col-sm-3 -->
                    </div> <!-- .row -->
                </div> <!-- .caption -->

                <div class="more">
                    <div class="row">
                        <div class="col-sm-12 myBtn">
                            <div class="right">
                                <div class="row">
                                    @can('userVideo', $video)
                                        <div class="col-sm-4">
                                            <!-- Form to send a HTTP DELETE request -->
                                            {!! Form::open(array('route' => array('video.destroy', $video->id), 'method' => 'delete')) !!}
                                                <button type="submit" class = "btn btn-md btn-default btn-shape">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="col-sm-4">
                                            <a href="{{ route('video.edit', $video->id) }}" class="btn btn-md btn-info btn-shape">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </div>
                                    @endcan
                                    <div class="col-sm-4">
                                        <a href="{{ route('homepage') }}" class="btn btn-md btn-default btn-shape">
                                            <i class="fa fa-home"></i>
                                        </a>
                                    </div>
                                </div><!-- .row -->
                            </div><!-- .right -->
                        </div><!-- #myBtn -->
                    </div> <!-- .row -->
                </div> <!-- .more -->
            </div> <!-- .thumbnail -->
        </div> <!-- .col-sm-9 -->
    </div> <!-- .row -->

@endsection

@section('scripts')
    <script src="/js/youtube.js"></script>
@endsection

