<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

</body>
</html>
@extends('layouts.master')

@section('title', 'About')

@section('styles')
    <style>
        .color-icon {
            color: #aa863a;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div id="mycarousel" class="carousel slide">
            <div class="carousel-inner">
                <div class="item active"
                 style="background: url('../image/about2.jpeg') no-repeat left center;
                   background-size: cover; height: 300px;">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1 style="color:#aa863a">Soma-tech</h1>
                            <p class="lead">Soma-tech is a learning management system that enables you to learn various technologies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- #mycarousel -->
    </div> <!-- .row -->

    <div class="row">
        <div class="col-sm-4">
            <h1 class="text-center color-icon">
                <i class="fa fa-upload"></i>
            </h1>
            <h3 class="text-center">Upload</h3>
            <p>
                You didn't find a video you were looking for?
                Upload your own from the dashboard so as to share with others.
            </p>
        </div> <!--.col-sm-4 -->
        <div class="col-sm-4">
            <h1 class="text-center color-icon">
                <i class="fa fa-pencil"></i>
            </h1>
            <h3 class="text-center">Edit</h3>
            <p class="text-center">
                Have you made a mistake on the video details?
                Do not fret. You can edit the title or description of the video you uploaded.
            </p>
        </div> <!--.col-sm-4 -->
        <div class="col-sm-4">
            <h1 class="text-center color-icon">
                <i class="fa fa-trash-o"></i>
            </h1>
            <h3 class="text-center">Delete</h3>
            <p class="text-center">
                Have you found a video that explains a technology better?
                Delete the existing video from your collection and upload the new one.
            </p>
        </div> <!--.col-sm-4 -->
    </div> <!-- .row -->

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mycarousel').carousel();
        });
    </script>
@endsection
