@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('inc.sidebar')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                @auth

                @if(Auth::user()->company())
                Previously Posted Jobs
                @endif
                @if(Auth::user()->applicant())
                Previously Applied Jobs
                @endif

                @endauth
                </div>

                <div class="card-body">
                    @include('inc.errors')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                @auth
                @if(Auth::user()->company())

                    @if(count(Auth::user()->jobs)>0)
                    <ul>
                    @foreach(Auth::user()->jobs as $job)
                    <li>{{$job->job_title}}
                        <ul>
                            @if(count($job->jobApplications)>0)
                            Applicants: <br>
                            @foreach($job->jobApplications as $jobApplication)
                            <li><a href="{{ route('profile.view',['id'=>encrypt($jobApplication->user->id)]) }}">{{$jobApplication->user->first_name}}&nbsp;{{$jobApplication->user->last_name}}</a></li>
                            @endforeach
                            @endif
                        </ul>
                    </li>
                    @endforeach
                    </ul>
                    @endif

                @endif

                @if(Auth::user()->applicant())

                    @if(count(Auth::user()->jobApplications)>0)

                    <ul>
                    @foreach(Auth::user()->jobApplications as $jobApplication)
                        <li>
                            {{$jobApplication->job->job_title}}
                        </li>
                    @endforeach
                    </ul>

                    @endif


                @endif
                @endauth

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
