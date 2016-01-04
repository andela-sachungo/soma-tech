@extends('layouts.master')

@section('title', 'Edit category')

@section('content')
    <div class="row">
        @include('partials.sidebar')

        <div class="col-sm-6">
            <h3>Edit Category</h3>

            {!! Form::model($category,['method' => 'PATCH', 'route' => ['category.update', $category->id]]) !!}
                @include('partials.error')

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <div>
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
