@extends('layouts.master')

@section('title', 'Show a category')

@section('content')
    <div id = "show-category" class="modal fade" tabindex="-1"
    role="dialog" aria-hidden="true" aria-labelledby="show-category">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Category</h4>
                </div>
                <div class="modal-body">
                    {{ $category->title }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="{{ route('category.destroy', $category->id)" class="btn btn-primary"> Delete </a>
                </div>
            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal -->
@endsection
