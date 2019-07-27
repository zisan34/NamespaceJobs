@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Create new Job</div>

        <div class="card-body">
            @include('inc.errors')
            
            <form method="post" action="{{ route('job.store') }}">
                @csrf
                <div class="form-group">
                    <label>Job Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label>Job Description</label>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="form-group">
                    <label>Salary</label>
                    <input type="number" name="salary" class="form-control">
                </div>
                <div class="form-group">
                    <label>Job Location</label>
                    <input type="text" name="location" class="form-control">
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <input type="text" name="country" class="form-control">
                </div>
                <input type="submit" name="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
