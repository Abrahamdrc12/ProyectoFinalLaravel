<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       
    }
    use RegistersUsers;
    public function index()
    {
       
        return view('medicos.index' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('admin.medicos.index')->with('success', 'El medicos se creo con exito');
    }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eps  $medicos
     * @return \Illuminate\Http\Response
     */
    public function edit(Medico $medico)
    {

        return view('medicos.edit', compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eps  $medicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medico $medico)
    {
        //
       
        return redirect()->route('admin.medicos.index')->with('info', 'El medicos se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eps  $medicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        return redirect()->route('admin.medicos.index')->with('success', 'El medicos se elimino con exito');
    }
}
