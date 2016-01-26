@extends('layouts.master')

@section('title', 'Edit video')

@section('content')
    <div class="row">
        @include('partials.sidebar')

        <div class="col-sm-7">
            <h3>Edit Video</h3>
            <hr>

            {!! Form::model($video,['method' => 'PATCH', 'route' => ['video.update', $video->id]]) !!}
                @include('partials.error')

                <div class="form-group{{ $errors->has('youtube_link') ? ' has-error' : '' }}">
                    {!! Form::label('link', 'Video URL', ['class' => 'control-label']) !!}
                    {!! Form::url('youtube_link', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    {!! Form::label('describe', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}
                </div>
                <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                    {!! Form::label('category', 'Category', ['class' => 'control-label']) !!}
                    <select name = "category_id" class="form-control select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $video->category_id ? 'selected' : ''}}> {{ $category->title }} </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
