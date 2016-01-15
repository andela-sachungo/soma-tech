@extends('layouts.master')

@section('title', 'Create video')

@section('content')
    <div class="row">
         @include('partials.sidebar')

        <div class="col-sm-6">
            <h3>Add a Video</h3>
            <form method="POST" action="{{ route('video.store') }}">
                {!! csrf_field() !!}
                @include('partials.error')

                <div class="form-group{{ $errors->has('youtube_link') ? ' has-error' : '' }}">
                    <label for="link" class="control-label">Video URL</label>
                    <input class="form-control" name = "youtube_link" id="link" type=" url" value="{{ old('youtube_link') }}">
                </div>
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="control-label">Title</label>
                    <input class="form-control" name = "title" id="title" type="text" value="{{ old('title') }}">
                </div>
                 <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="describe" class="control-label">Description</label>
                    <textarea class="form-control" name = "description" rows="5" id="describe" placeholder ="What's the video about?"></textarea>
                </div>
                <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                    <select name = "category_id" class="form-control select">
                        <option value = "">Select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection