@extends('layouts.master')

@section('title', 'My videos')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/css/video.css">
@endsection

@section('content')
    <div class="row">
        @include('partials.sidebar')

        <div class="col-sm-10">
            <div class="container exceed">
                @foreach ($videos as $video)
                    <div class="col-sm-3 vid">
                        <div class="align-videos">
                        <!-- 16:9 aspect ratio -->
                            <div class="embed-responsive embed-responsive-16by9">
                              <iframe class="embed-responsive-item" src="{{ $video->youtube_link }}"></iframe>
                            </div>
                            <h3>{{ $video->title }}</h3>
                            <h6>{{ substr($video->created_at, 0, 10) }}</h6>
                            <p> {{ $video->description }}</p>
                            @can('userVideo', $video)
                                <div class="btn-bottom">
                                    <a href="{{ route('video.edit', $video->id) }}" class="btn btn-lg btn-primary btn-shape">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <span></span>
                                    <a href="{{ route('video.destroy', $video->id) }}" class="btn btn-lg btn-primary btn-shape">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            @endcan
                        </div> <!--.align-videos -->
                    </div> <!-- .col-sm-3 vid -->
                @endforeach
            </div> <!--.container exceed -->
            {!! $videos->render() !!}
        </div> <!-- .col-sm-10 -->
    </div> <!--end .row -->
@endsection
