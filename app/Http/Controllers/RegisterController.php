<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\storage;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Hash;





class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:155', 'unique:users'],
            'email' => 'email:dns|required|unique:users',
            'password' => 'required|min:4|max:255',
            'slug' => 'required|unique:users'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        
        User::create($validatedData);

        // $request->session()->flash('success', 'Regitration Successfull! Please Login!');


        return redirect('/login')->with('success', 'Regitration Successfull! Please Login!');
    }
    
}
