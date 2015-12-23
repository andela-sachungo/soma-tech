@extends('layouts.master')

@section('title', 'My category')

@section('styles')
    <style type="text/css">
        .btn-shape {
            border-radius: 30px;
            margin-right: 5px;
            float: right;
            margin-top: 5px;
        }
        #panel-list {
            max-height: 300px;
        }
        #scrollable-list {
            max-height: 300px;
            overflow: auto;
        }
        .inline-div a {
            display: inline-block;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        @include('partials.sidebar')

        <div class="col-sm-6">
            <div class="panel panel-info" id="panel-list">
                <div class="panel-heading">
                    <h3 class="panel-title">Categories</h3>
                </div>
                <div class="list-group inline-div" id="scrollable-list">
                    @foreach($users as $user)
                        @foreach ($user->categories as $category)
                            <a href = "#" class="list-group-item">
                                {{ $category->title }}
                            </a>
                            @can('userCategory', $category)
                                <a href="#" class="btn btn-sm btn-primary btn-shape btn-modal">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @include('partials.category_edit_modal')

                                <!-- Form to send a HTTP DELETE request -->
                                {!! Form::open(array('route' => array('category.destroy', $category->id), 'method' => 'delete')) !!}
                                    <button type="submit" class = "btn btn-sm btn-primary btn-shape"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}

                            @endcan
                        @endforeach
                    @endforeach
                </div> <!-- .list-group -->
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
    <script type="text/javascript">
        $(document).ready(function(){
            $(".list-group-item").click(function(){
                $("#pinside").text($(this).text());
                $("#show-category").modal('show');
            });
            $(".btn-modal").click(function(){
                //$("#pinside").text($(this).text());
                $("#edit-category").modal('show');
            });
            $(".btn-add").click(function(){
                $("#add-category").modal('show');
            });
        });
    </script>
@endsection
