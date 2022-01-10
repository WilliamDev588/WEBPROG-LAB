<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
   
    public function show_profile(Request $request)
    {
        
        return view('profile.profile', [
            'user' => $request->user()
        ]);
    }
    
    public function update_profile(Request $request)
    {
        return view('profile.update_profile', [
            'user' => $request->user()
        ]);
    }

    public function updating_profile(Request $request)
    {
        $validated = $request->validate([
            'fullname' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore(Auth::user()->id)], 
            'password' => ['required', 'string', 'min:5', 'max:20'],
            'address' => ['string', 'min:5', 'max:95'],
        ],
        
        );
        $request->user()->update(
            $request->all()
        );  
        $request->user()->update(
            ['password' => Hash::make($request->get('password'))]
        );   
        return redirect()->route('profile');
    }
}
