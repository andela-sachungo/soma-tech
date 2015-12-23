@extends('layouts.master')

@section('title', 'List category')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Categories</h3>
                </div>
                <div class="list-group">
                @foreach ($categories as $category)
                    <a href = "{{ route('category.show', $category->id) }}" class="list-group-item">{{ $category->title }}</a>
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection