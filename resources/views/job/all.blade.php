@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">All available jobs</div>

        <div class="card-body">
            @include('inc.errors')
            @if(count($jobs)>0)
            <ul>
            @foreach($jobs as $job)
            <li>
                {{$job->job_title}}
                <ul>
                    <li>Description:{{$job->job_description}}</li>
                    <li>Salary:{{$job->salary}}</li>
                    <li>Location:{{$job->location}},{{$job->country}}</li>
                </ul>
            </li>
            <a href="{{ route('job.apply',['job_id'=>encrypt($job->id)]) }}" class="btn btn-primary">Apply for this job</a>
            @endforeach
            </ul>
            @endif
        </div>
    </div>
</div>
@endsection
