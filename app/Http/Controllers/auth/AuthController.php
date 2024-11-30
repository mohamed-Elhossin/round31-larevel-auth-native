<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    function show_register()
    {
        return view("auth.register");
    }
    function register(Request $request)
    {

        $kelo = 1024 * 1;
        $request->validate([
            "name" => "required|string|min:3|max:255",
            "email" => "required|string|email|min:3|max:255|unique:users,email",
            "password" => "required|string|min:6|confirmed",
            "image" => "file|max:$kelo",
        ]);

        if ($request->hasFile("image")) {
            $file_data = $request->file("image");
            $image_name = time() . $file_data->getClientOriginalName();
            $location = public_path("/upload");
            $file_data->move($location, $image_name);
        } else {
            $image_name = "def.jpg";
        }

        $user =   User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
            "image" => $image_name

        ]);
        return redirect()->back()->with("done", "Create User Done");
    }



    function show_login()
    {
        return view("auth.login");
    }
    function login(Request $request)
    {
        $request->validate([
            "email" => "required|string|email",
            "password" => "required|string|min:6",
        ]);

        if (Auth::attempt($request->only("email", "password"))) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }


        return redirect()->back()->with("fail", "Wrong password And user Name");
    }


    function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }
}
