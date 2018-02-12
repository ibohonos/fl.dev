<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;

class UserController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function dashboard()
    {
    	$this->data['user'] = Auth::user();

    	return view('user.index', $this->data);
    }

    public function saveBasic(Request $request)
    {
    	$request->validate([
			'first_name' => 'required',
			'last_name' => 'required',
		]);

		$user = Auth::user();

        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->birthday = $request['birthday'];
        $user->resume = $request['resume'];
        $user->save();

        return redirect()->back();
    }

    public function saveImage(Request $request)
    {
    	$request->validate([
			'image' => 'required',
		]);

        $image = $request->file('image');
        $filename = time() . '-' . Auth::user()->first_name . '-' . Auth::user()->last_name . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save( storage_path('app/public/avatars/' . $filename ) );

        $user = Auth::user();

        $user->avatar = 'public/avatars/' . $filename;
        $user->save();

        return redirect()->back();
    }

    public function saveContacts(Request $request)
    {
        $request->validate([
			'email' => 'required',
		]);

        $user = Auth::user();

        $user->phone = $request['phone'];
        $user->email = $request['email'];
        $user->save();

        return redirect()->back();
    }

    public function savePay(Request $request)
    {
        $user = Auth::user();

        $user->pay_card_pb = $request['pay_card_pb'];
        $user->pay_card_2 = $request['pay_card_2'];
        $user->save();
        
        return redirect()->back();
    }
}
