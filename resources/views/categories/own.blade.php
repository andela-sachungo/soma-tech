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

        tbody {
            display:block;
            height: 300px;
            overflow: auto;
        }

        tbody tr {
            display: table;
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        @include('partials.sidebar')

        <div class="col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Categories</h3>
                </div>
                <table class="table table-striped table-responsive">
                    <tbody>
                        @foreach ($users as $user)
                            @foreach ($user->categories as $category)
                                <tr>
                                   <td>
                                        <a href="#" class="category-list">
                                            {{ $category->title }}
                                        </a>
                                   </td>
                                   @can('userCategory', $category)
                                    <td class="text-nowrap">
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-primary btn-shape" id="edit-btn">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <!-- Form to send a HTTP DELETE request -->
                                        {!! Form::open(array('route' => array('category.destroy', $category->id), 'method' => 'delete')) !!}
                                            <button type="submit" class = "btn btn-sm btn-primary btn-shape" name="delete-btn"><i class="fa fa-trash"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                   @endcan
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>

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
            $(".category-list").click(function(){
                $("#pinside").text($(this).text());
                $("#show-category").modal('show');
            });
            $(".btn-add").click(function(){
                $("#add-category").modal('show');
            });
        });
    </script>
@endsection
