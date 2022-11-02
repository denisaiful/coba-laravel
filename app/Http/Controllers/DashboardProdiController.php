<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Campus;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.prodi.index',
        [   
            'title' => 'Login',
            'prodies' => Prodi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.prodi.create',[
            'prodis' => Prodi::all(),
            'campuses' => Campus::all(),
            'fakulties' => Faculty::all()
           
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
            'id_kampus' =>'required|max:255',
            'id_fakultas' =>'required|max:255'
           
            
        ]);
      
             

        Prodi::create($validatedData);

        return redirect('/dashboard/prodi')->with('success', 'New Prodi has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function edit(Prodi $prodi)
    {
        return view('dashboard.prodi.edit',[
            'prodi' => $prodi,
            'prodis' => Prodi::all(),
            'campuses' => Campus::all(),
            'fakulties' => Faculty::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prodi $prodi)
    {
        $rules = [            
            'name' =>'required',
            'id_kampus' =>'required',
            'id_fakultas' =>'required'
            
        ];


        $validatedData = $request->validate($rules);
            
        Prodi::where('id', $prodi->id)
        ->update($validatedData);

        return redirect('/dashboard/prodi')->with('success', 'Campus has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prodi::destroy('id', $id);
        return redirect('/dashboard/prodi')->with('success', 'Prodi has been deleted');
    }
}
