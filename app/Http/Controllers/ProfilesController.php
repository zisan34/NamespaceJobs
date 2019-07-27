<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Profile;
use App\User;

use Session;

class ProfilesController extends Controller
{
    //
    public function edit()
    {
    	return view('profile.edit')->with('profile',Auth::user()->profile);
    }
    public function update(Request $request)
    {
    	$this->validate($request,[
    		'picture'=>'image|max:3000',
    		'resume'=>'mimes:pdf,docx|max:10000'
    	]);

    	$profile=Auth::user()->profile;

    	$profile->skills=$request->skills;

    	if($request->hasFile('picture'))
        {
            $picture=$request->picture;
            $picture_new=time().'_'.$profile->user_id.'_'.$picture->getClientOriginalName();
            $picture->move('uploads/picture',$picture_new);
            $profile->profile_picture='/uploads/picture/'.$picture_new;
        }
        if($request->hasFile('resume'))
        {
            $resume=$request->resume;
            $resume_new=time().'_'.$profile->user_id.'_'.$resume->getClientOriginalName();
            $resume->move('uploads/resume',$resume_new);
            $profile->resume='/uploads/resume/'.$resume_new;
        }

    	if($profile->save())
    	{
    		Session::flash('success','Successfully updated profile');
    		return redirect()->route('home');
    	}

    	return redirect()->back();
    }
    public function view($id)
    {
        $user=User::find(decrypt($id));

        $profile=$user->profile;

        return view('profile.view')->with('profile',$profile);
    }
}
