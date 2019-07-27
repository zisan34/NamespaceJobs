@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Update Your Profile Info</div>

        <div class="card-body">
            @include('inc.errors')
            <form method="post" action="{{ route('profile.update') }}"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Change Profile Picture</label>
                    <input type="file" name="picture" >
                </div>
                <div class="form-group">
                    <label>Change Resume</label>
                    <input type="file" name="resume" >
                </div>
                <div class="form-group">
                    <label>Skills</label>
                    <input type="text" name="skills" class="form-control" value="@php
                                if(old('skills'))
                                echo old('skills');
                                else 
                                echo $profile->skills;
                                @endphp" >
                </div>
                <input type="submit" name="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
