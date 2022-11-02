<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Campus;
use App\Models\Beasiswa;
use Illuminate\Http\Request;


class DashboardFakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.fakultas.index',
        [   
            'title' => 'Login',
            'fakulties' => Faculty::all(),
            'beasiswas' => Beasiswa::with(['campus'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('dashboard.fakultas.create',[
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
            'id_univ' =>'required|max:255'
           
            
        ]);
      
             

        Faculty::create($validatedData);

        return redirect('/dashboard/fakultas')->with('success', 'New Fakultas has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fakultas = Faculty::find($id);
        return view('dashboard.fakultas.edit',[
            'faculty' => $fakultas,
            'fakulties' => Faculty::all(),
            'campuses' => Campus::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [            
            'name' =>'required',
            'id_univ' =>'required'
            
        ];


        $validatedData = $request->validate($rules);
            
        Faculty::where('id', $id)
        ->update($validatedData);

        return redirect('/dashboard/fakultas')->with('success', 'Facultas has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if($campus->image){
        //     storage::delete($campus->image);
        // }
        Faculty::destroy('id', $id);
        return redirect('/dashboard/fakultas')->with('success', 'Fakultas has been deleted');
    }
}
