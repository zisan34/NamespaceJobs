@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">What are you?</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registerForm') }}">
                        @csrf

                        <div class="form-group row">
                            <label class="radio-inline"><input type="radio" name="user_type" value="company">Company</label>
                            <label class="radio-inline"><input type="radio" name="user_type" value="applicant">Applicant</label>
                        </div>

                        <input type="submit" name="Next" class="btn btn-primary">

 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
