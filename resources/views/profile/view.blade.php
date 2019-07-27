@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Profile Info of {{$profile->user->first_name}}</div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">First Name:</div>
                <div class="col-sm-9">
                    {{$profile->user->first_name}}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">Last Name:</div>
                <div class="col-sm-9">
                    {{$profile->user->last_name}}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">Profile Picture:</div>
                <div class="col-sm-9">
                    <img src="{{ asset($profile->profile_picture) }}" height="200px" width="200px">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">Resume:</div>
                <div class="col-sm-9">
                    <embed src="{{ asset($profile->resume)}}" style="width:600px; height:800px;" frameborder="0">

                    
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">Skills:</div>
                <div class="col-sm-9">
                    {{$profile->skills}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
