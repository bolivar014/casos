<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;
use App\Models\Person;
use App\Models\TicketUser;
class TicketsController extends Controller
{
    // Constructor para permitir el uso de sólo personas autenticadas
    public function __construct() {
        return $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = DB::table('tickets')
        // ->join('users', 'users.id' , '=', 'tickets.fk_id_abogado')
        ->join('people', 'people.id' , '=', 'tickets.fk_id_cliente')
        // ->select('tickets.*', 'users.name', 'people.nombre_completo')
        ->select('tickets.*', 'people.nombre_completo')
        ->paginate(10);

        //Retornamos vista index con objeto Tickets
        return view('tickets.index', [
            // 'tickets' => Ticket::paginate(10)
            'tickets' => $tickets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Consultamos personas
        $peoples = DB::table('people')->get();

        // Retornamos vista crear ticket
        return view('tickets.create', [
            'peoples' => $peoples,
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
        // Creamos conexión al modelo
        $ticket = new Ticket();

        // Validación back inputs
        $validarDatos = $request->validate([
            'selIdCliente' => 'required',
            // 'selIdAbogado' => 'required',
            'selIdAbogado' => '',
            'txt_solicitud_caso' => 'required|min:5|max:50',
            'textDescripcion' => 'required|min:5|max:255',
            'objAbogados' => 'required'
        ]);

        $ticket->fk_id_cliente = $validarDatos['selIdCliente'];
        // $ticket->fk_id_abogado = $validarDatos['selIdAbogado'];
        $ticket->estado_caso = "Creado";
        $ticket->nombre_caso = $validarDatos['txt_solicitud_caso'];
        $ticket->descripcion = $validarDatos['textDescripcion'];

        // Guardamos
        $ticket->save();

        // ----------------
        // Recupero la ultima ejecución
        $idDataUltimaInsercion = Ticket::latest()->first()->id;
        $objIdsAbogadosAux = "";

        // Recuperamos Array con ids de abogados encargados
        $objIdsAbogados = $validarDatos['objAbogados'];
        
        // Iteramos para acceder al objeto de ids
        foreach ($objIdsAbogados as $key => $value) {
            $objIdsAbogadosAux = $value;
        }

        // Separamos el obj de ids
        $objidsAbogados = explode(',', $objIdsAbogadosAux);

        // Realizamos inserción de todos los registros en DB.
        for($i = 0 ; $i < (COUNT($objidsAbogados)) ; $i++) {
            $TicketUser = new TicketUser();
            $TicketUser->ticket_id = $idDataUltimaInsercion;
            $TicketUser->user_id = $objidsAbogados[$i];
            $TicketUser->save();
        }

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
        // Consultamos personas
        $people = Person::findOrFail($id);

        // Buscamos id en base de datos
        $ticket = Ticket::findOrFail($id);

        // Retornamos vista con objeto de ticket
        return view('tickets.show', [
            'ticket' => $ticket,
            'people' => $people
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
        // Consultamos personas
        $people = Person::findOrFail($id);
        // Buscamos id en base de datos
        $ticket = Ticket::findOrFail($id);

        // Retornamos vista con objeto de ticket
        return view('tickets.edit', [
            'ticket' => $ticket,
            'people' => $people
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
            'selIdAbogado' => 'required|exists:users,id',
            'txt_solicitud_caso' => 'required|min:5|max:50',
            'textDescripcion' => 'required|min:5|max:255'
        ]);

        // Buscamos id en base de datos
        $ticket = Ticket::findOrFail($id);
        
        $ticket->fk_id_cliente = $validarDatos['selIdCliente'];
        // $ticket->fk_id_abogado = $validarDatos['selIdAbogado'];
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
