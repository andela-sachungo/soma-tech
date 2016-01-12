@extends('layouts.master')

@section('title', 'Create category')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3>Create a Category</h3>
            <form method="POST" action="{{ route('category.store') }}">
                {!! csrf_field() !!}
                @include('partials.error')

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="control-label">Title</label>
                    <input class="form-control" name = "title" id="title" type="text" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
                <input name="email" value="{{ auth()->user()->email }}" hidden>
            </form>
        </div>
    </div>
@endsection