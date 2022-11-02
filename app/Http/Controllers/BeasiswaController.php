<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Campus;

use App\Http\Requests\StoreBeasiswaRequest;
use App\Http\Requests\UpdateBeasiswaRequest;

class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.beasiswa.index',
        [   
            'title' => 'Login',
            'beasiswas' => Beasiswa::with(['campus','faculty'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.beasiswa.create',[
            'beasiswas' => Beasiswa::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBeasiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBeasiswaRequest $request)
    {
        $validatedData = $request->validate([            
            'NAMA' =>'required|max:255',
            'NIP' => 'required',
            'STRATA' => 'required'
        ]);

        Beasiswa::create($validatedData);

        return redirect('/dashboard/beasiswa')->with('success', 'New Post has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Beasiswa $beasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Beasiswa $beasiswa)
    {
        return view('dashboard.beasiswa.edit',[
            'beasiswa' => $beasiswa,
            'campuses' => Campus::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBeasiswaRequest  $request
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBeasiswaRequest $request, Beasiswa $beasiswa)
    {
        $rules = [            
            'NAMA' =>'required',
            'UNIV' =>'required'
            
        ];
        $validatedData = $request->validate($rules);
        Beasiswa::where('id', $beasiswa->id)
        ->update($validatedData);

        return redirect('/dashboard/beasiswa')->with('success', 'Beasiswa has been Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beasiswa $beasiswa)
    {
        //
    }
}
