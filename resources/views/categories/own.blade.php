@extends('layouts.master')

@section('title', 'My category')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/css/soma.css">
@endsection

@section('content')
    <div class="row">
        @include('partials.sidebar')

        <div class="col-sm-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Categories</h3>
                </div>
                @if ($categories->count() === 0)
                    <div class="panel-body">
                        <p id="text-style">You have not yet created a category.<br>
                        Click <strong>Add Category</strong> to create one.</p>
                    </div>
                @else
                    <table class="table table-striped table-responsive">
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <a href="#" class="category-list">
                                            {{ $category->title }}
                                        </a>
                                    </td>
                                    @can('userCategory', $category)
                                        <td class="text-nowrap">
                                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-primary btn-shape">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <!-- Form to send a HTTP DELETE request -->
                                            {!! Form::open(array('route' => array('category.destroy', $category->id), 'method' => 'delete')) !!}
                                                <button type="submit" class = "btn btn-sm btn-primary btn-shape">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                @include('partials.category_modal')
                <div class="panel-footer">
                    <a href="#" class="btn btn-sm btn-primary btn-add">Add Category</a>
                </div> <!-- .panel-footer -->
                @include('partials.category_add_modal')
            </div> <!-- .panel panel-info -->
        </div> <!-- .col-sm-6 -->
    </div><!-- .row -->
@endsection

@section('scripts')
    @include('partials.flash')
    <script src = "/js/soma.js"></script>
@endsection
