<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Retornamos vista index con objeto Tickets
        return view('tickets.index', [
            'tickets' => Ticket::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retornamos vista crear ticket
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Creamos conexión al modelo
        $ticket = new Ticket();

        // Validación back inputs
        $validarDatos = $request->validate([
            'selIdCliente' => 'required',
            'selIdAbogado' => 'required',
            'txt_solicitud_caso' => 'required|min:5|max:50',
            'textDescripcion' => 'required|min:5|max:255'
        ]);

        $ticket->id_cliente = $validarDatos['selIdCliente'];
        $ticket->fk_id_abogado = $validarDatos['selIdAbogado'];
        $ticket->estado_caso = "Creado";
        $ticket->nombre_caso = $validarDatos['txt_solicitud_caso'];
        $ticket->descripcion = $validarDatos['textDescripcion'];

        // Guardamos
        $ticket->save();

        // Retornamos vista
        return redirect('/tickets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Buscamos id en base de datos
        $ticket = Ticket::findOrFail($id);

        // Retornamos vista con objeto de ticket
        return view('tickets.show', [
            'ticket' => $ticket
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Buscamos id en base de datos
        $ticket = Ticket::findOrFail($id);

        // Retornamos vista con objeto de ticket
        return view('tickets.edit', [
            'ticket' => $ticket
        ]);
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
        // Validación back inputs
        $validarDatos = $request->validate([
            'selIdCliente' => 'required',
            'selIdAbogado' => 'required',
            'txt_solicitud_caso' => 'required|min:5|max:50',
            'textDescripcion' => 'required|min:5|max:255'
        ]);

        // Buscamos id en base de datos
        $ticket = Ticket::findOrFail($id);
        
        $ticket->id_cliente = $validarDatos['selIdCliente'];
        $ticket->fk_id_abogado = $validarDatos['selIdAbogado'];
        $ticket->estado_caso = "Creado";
        $ticket->nombre_caso = $validarDatos['txt_solicitud_caso'];
        $ticket->descripcion = $validarDatos['textDescripcion'];

        // Guardamos
        $ticket->save();

        // Retornamos vista
        return redirect('/tickets');
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
