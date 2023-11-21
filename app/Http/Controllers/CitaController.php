<?php

namespace App\Http\Controllers;



use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
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
        
       
        
        return view('citas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('citas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => ['required',  'unique:citas'],
           
            'id_especialidad' => ['required'],
        ]);
        $user = Auth::user();
        $paciente = Paciente::where('id_usuario', $user->id)->first();
        Cita::create([
            'fecha' => $request->input('fecha'),
            'id_especialidad' => $request->input('id_especialidad'),
            'cod_paciente' => $paciente->id,

        ]);
        return redirect()->route('admin.citas.index')->with('success', 'La citas se creo con exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eps  $citas
     * @return \Illuminate\Http\Response
     */
    public function edit(Cita $cita)
    {
        $especialidades = Especialidad::pluck('nombre', 'id');
        return view('citas.edit', compact('cita', 'especialidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eps  $citas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        //
        $request->validate(['nombre' => 'required']);
        $cita->update($request->all());
        return redirect()->route('admin.citas.index')->with('info', 'La citas se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eps  $citas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect()->route('admin.citas.index')->with('success', 'La citas se elimino con exito');
    }
}
