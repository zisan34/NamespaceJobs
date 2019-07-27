@auth
@if(Auth::user()->company())
<a href="{{route('job.create')}}" class="btn btn-block btn-info">Post new job</a>
@endif
@if(Auth::user()->applicant())
<a href="{{ route('profile.edit') }}" class="btn btn-block btn-info">Edit Profile</a>

<a href="{{ route('job.all') }}" class="btn btn-block btn-info">Find jobs</a>
@endif
@endauth



