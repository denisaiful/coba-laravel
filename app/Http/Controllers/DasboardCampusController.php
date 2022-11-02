<?php

namespace App\Http\Controllers;

use App\Models\campus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;
use Illuminate\Support\Str;

class DasboardCampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.campus.index',
        [   
            'title' => 'Login',
            'campuses' => Campus::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.campus.create',[
            'campuses' => Campus::all()
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
            'name' =>'required|max:255',
            'image' => 'image|file|max:1024'
            
        ]);
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('campus');
        }
             

        Campus::create($validatedData);

        return redirect('/dashboard/campus')->with('success', 'New Campus has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function show(campus $campus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function edit(campus $campus)
    {
        return view('dashboard.campus.edit',[
            'campus' => $campus,
            'campuses' => Campus::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, campus $campus)
    {
        $rules = [            
            'name' =>'required',
            'image' => 'image|file|max:1024'
            
        ];


        $validatedData = $request->validate($rules);
           
        if($request->file('image')){

            if($request->oldImage){
                storage::delete($request->oldImage);
            }
                $validatedData['image'] = $request->file('image')->store('campus');
            }
    
            
        Campus::where('id', $campus->id)
        ->update($validatedData);

        return redirect('/dashboard/campus')->with('success', 'Campus has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy(campus $campus)
    {
        if($campus->image){
            storage::delete($campus->image);
        }
        Campus::destroy($campus->id);
        return redirect('/dashboard/campus')->with('success', 'Post Post has been deleted');
    }
}
