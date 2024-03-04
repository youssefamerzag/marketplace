<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show($id) {
        $user = Auth::user();

        return view('profile.show',[
            'user' => $user,
            'products' => Product::where('user_id', $id)->get()
        ]);
    }

    public function profileEdit($id) {
        $user = Auth::user();
        return view('profile.edit',[
            'profile' => $user,
            'user' => User::find($id)
        ]);
    }

    public function profileUpdate(Request $request, $id) {
        $request->validate([
            'profile-name' => 'required',
            'profile-email' => 'required',
            'profile-password' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->input('profile-name');
        $user->email = $request->input('profile-email');
        $user->password = $request->input('profile-password');

        $user -> save();

        return to_route('profile.show', $user->id);
    }
}
