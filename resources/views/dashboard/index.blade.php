@extends('layouts.master')

@section('title', 'Dashboard')

@section('styles')
    <style type="text/css">
        img .avatar {
            border: 1px solid #eee;
        }

        #profile {
            font-style:oblique;
            font-size: 1.5em;
        }

        .photo-size {
            width: 200px;
            height: 200px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
         @include('partials.sidebar')

        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-12">
                    <h4>{{ auth()->user()->name}}</h4>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-sm-4 text-center">
                        @if(auth()->user()->avatar)
                            <img src="{{ auth()->user()->avatar }}" class="img-circle avatar img-thumbnail img-responsive">
                        @else
                            <img src="/image/person_avatar.png" class="img-circle avatar img-thumbnail img-responsive photo-size">
                        @endif
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                           <div class="col-sm-7" id = "profile">
                                <span class="text-muted">Name:</span>{{ auth()->user()->name}}<br>
                                <span class="text-muted">Email:</span> {{ auth()->user()->email}}<br>
                                <span class="text-muted">Created on:</span> {{ substr(auth()->user()->created_at, 0, 10) }}<br>
                           </div> <!-- .col-sm-6-->
                        </div> <!-- .row-->
                    </div> <!-- .col-sm-8-->
                </div> <!-- .row-->
            </div> <!-- .row-->
            <hr>
        </div> <!-- .col-sm-9-->
    </div> <!-- .row-->
@endsection

@section('scripts')
    @include('partials.flash')
@endsection
