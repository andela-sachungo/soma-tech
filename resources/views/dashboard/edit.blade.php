@extends('layouts.master')

@section('title', 'Edit profile')

@section('styles')
    <style type="text/css">
        img .avatar {
            border: 1px solid #eee;
        }
        .edit-box {
            border-style: ridge;
            padding: 8px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.css">
@endsection

@section('content')
    <div class="row">
        @include('partials.sidebar')
        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Edit Profile</h3>
                    <hr>
                </div>
            </div>
            <div class="row edit-box">
                <div class="col-sm-4">
                   <div class="text-center">
                        <img src="{{ $user->avatar }}"
                             class="avatar img-circle img-thumbnail img-responsive"
                             alt="avatar">
                        <h4>Upload a different photo...</h4>
                        <form action="{{ route('change.avatar', $user->id) }}"
                              method="POST"
                              class="dropzone"
                              id="change-avatar">
                            {!! csrf_field() !!}
                        </form>
                    </div>
                </div>
                <div class="col-sm-8">
                    {!! Form::model($user,['method' => 'PATCH', 'route' => ['profile.update', $user->id]]) !!}
                        @include('partials.error')

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Full name', ['class' => 'control-label']) !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Email', ['class' => 'control-label']) !!}
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>
                        <div>
                            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script >
        Dropzone.options.changeAvatar = {
            paramName: "photo",
            maxFilesize: 1,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp',
            maxFiles: 1,
            init: function() {
                this.on('maxfilesexceeded', function(file) {
                    this.removeAllFiles();
                    this.addFile(file);
                });
            }
        };
    </script>
@endsection
