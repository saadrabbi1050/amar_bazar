<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        
        return view('backend.users.index', compact('users'));
    }

    public function contactUpdate(Request $request, $user_id)
    {
        $user = User::find($user_id);
        
        Contact::updateOrInsert(
            ['user_id' => $user->id],
            [
                'phone_no' => $request->phone_no , 
                'address' => $request->address
            ]
        );

        return redirect()->route('user.index');
        
    }
}
