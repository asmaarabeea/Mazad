<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserProfileController extends Controller
{
	public function index($id)
	{
		$user = User::find($id);
		
		return view('userprofile',compact('user'));
	}
	
	public function update(Request $request)
	{
		$user = User::find($request->id);
		
		if($request->save){
			
			$this->validate($request,[
			'name' => 'required|max:255',
			'email' => 'required|email|max:255',
			'location' => 'required|max:255',
			]);
			
			$user->name = $request->name;
			$user->email = $request->email;
			$user->location = $request->location;
			$user->save();
			return redirect("/homepage");
		
		}else {
			return redirect("/homepage");
		}
		
	}
}