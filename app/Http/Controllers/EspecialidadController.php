<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
class EspecialidadController extends Controller
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
        
        return view('especialidades.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        return view('especialidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    
       
        return redirect()->route('admin.especialidades.index')->with('success','La especialidad se creo con exito');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eps  $especialidades
     * @return \Illuminate\Http\Response
     */
    public function edit(Especialidad $especialidade)
    {
        
        return view('especialidades.edit',compact('especialidade','medicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eps  $especialidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Especialidad $especialidade)
    {
        //
    
        return redirect()->route('admin.especialidades.index')->with('info','La especialidad se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eps  $especialidades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especialidad $especialidade)
    {
        return redirect()->route('admin.especialidades.index')->with('success','La especialidad se elimino con exito');
    }
}
