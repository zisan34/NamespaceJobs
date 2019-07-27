<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;
use App\Job;
use App\JobApplication;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('job.all')->with('jobs',Job::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        if(!Auth::user()->company())
        {
            Session::flash('error','Invalid Request');
            return redirect()->route('home');
        }
        return view('job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'salary'=>'required|numeric',
            'location'=>'required',
            'country'=>'required',
        ]);

        if(!Auth::user()->company())
        {
            Session::flash('error','Invalid Request');
            return redirect()->route('home');
        }

        $job=Job::create([
            'job_title'=>$request->title,
            'job_description'=>$request->description,
            'salary'=>$request->salary,
            'location'=>$request->location,
            'country'=>$request->country,
            'user_id'=>Auth::id()
        ]);
        Session::flash('success','Job posted successfully');

        return redirect()->route('home');

    }

    public function apply($job_id)
    {
        $job=Job::find(decrypt($job_id));

        if(Auth::user()->applied($job->id))
        {
            Session::flash('error','Already applied');
            return redirect()->back();
        }
        if(!Auth::user()->profile->resume)
        {
            Session::flash('error','Please upload your CV');
            return redirect()->route('profile.edit');
        }
        $job_application=new JobApplication;
        $job_application->job_id=$job->id;
        $job_application->user_id=Auth::id();
        $job_application->save();
        Session::flash('success','Applied for the job successfully');
        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
