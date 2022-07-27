<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retornamos vista index con objeto Personas
        return view('users.index', [
            'persons' => Person::paginate(10)
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retornamos vista crear usuario
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        $validarDatos = $request->validate([
            'selTipoDoc' => 'required',
            'txt_num_doc' => 'required|min:4|max:15',
            'txt_nombre_comp' => 'required|min:5|max:255',
            'txt_email' => 'required|min:5|max:255',
            'txt_telefono' => 'required|min:10|max:10'
        ]);

        // Creamos conexión al modelo
        $person = new Person();

        // 
        $person->tipo_doc = $validarDatos['selTipoDoc'];
        $person->num_doc = $validarDatos['txt_num_doc'];
        $person->nombre_completo = $validarDatos['txt_nombre_comp'];
        $person->email = $validarDatos['txt_email'];
        $person->telefono = $validarDatos['txt_telefono'];

        // Guardamos registro
        $person->save();

        // Redireccionamos
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
