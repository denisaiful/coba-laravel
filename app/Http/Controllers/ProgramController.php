<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.program.index',
        [   
            'title' => 'Login',
            'beasiswas' => Beasiswa::with('campus')->where('NIP', auth()->user()->username)->get()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($beasiswa)
    {
       
        $beasiswa = Beasiswa::find($beasiswa);
      
        return view('dashboard.program.show',[
            'beasiswa' => $beasiswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beasiswa = Beasiswa::find($id);
        return view('dashboard.program.edit',[
            'beasiswa' => $beasiswa,
            'beasiswas' => Beasiswa::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [            
           
            'jurnal1' => 'mimes:pdf|max:1024',
            'jurnal2' => 'mimes:pdf|max:1024',
            'tesis' => 'mimes:pdf|max:1024' 
           
        ];
        $validatedData = $request->validate($rules);
           
        if($request->file('jurnal1')){

            if($request->oldjurnal1){
                storage::delete($request->oldjurnal1);
            }
                $validatedData['jurnal1'] = $request->file('jurnal1')->store('campus');
            }

            if($request->file('jurnal2')){

                if($request->oldjurnal2){
                    storage::delete($request->oldjurnal2);
                }
                    $validatedData['jurnal2'] = $request->file('jurnal2')->store('campus');
                }
               
                if($request->file('tesis')){

                    if($request->oldtesis){
                        storage::delete($request->oldtesis);
                    }
                        $validatedData['tesis'] = $request->file('tesis')->store('campus');
                    }
                
    
            
        Beasiswa::where('id', $id)
        ->update($validatedData);

        return redirect('/dashboard/programs')->with('success', 'Post has been Updated');
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
