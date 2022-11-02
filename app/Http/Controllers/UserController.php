<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\storage;
use Illuminate\Support\Facades\Hash;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.index',
        [   
            'title' => 'Login',
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.create',[
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:155', 'unique:users'],
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4|max:255',
            'slug' => 'required',
            'is_admin' => 'required'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Regitration Successfull! Please Login!');


        return redirect('/dashboard/user')->with('success', 'Input User Successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit',[
            'user' => $user,
            'users' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        {
            $rules = [            
                'name' =>'required|max:255',
                'is_admin' =>'max:2'
               // 'username' => ['required', 'min:3', 'max:155', 'unique:users']
                //'email' => 'email|required|unique:users'
                
           
            ];

            if($request->email != $user->email) {
                $rules['email'] = 'required|unique:users';
            }

            if($request->username != $user->username) {
                $rules['username'] = 'required|unique:users';
            }
            if($request->slug != $user->slug) {
                $rules['slug'] = 'required|unique:users';
            }
    
            $validatedData = $request->validate($rules);
         
        }
        User::where('id', $user->id)
        ->update($validatedData);

        return redirect('/dashboard/user')->with('success', 'user has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
        User::destroy($user->id);

        return redirect('/dashboard/user')->with('success', 'User has been deleted');
    }
}
