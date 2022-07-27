<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // Retornamos vista
        return view('apis.show');
    }

    // Función para retornar api TRMCO
    public function trmCO() {
        // Inicializamos curl
        $curl = curl_init();

        // Configuración de curl
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.anicamenterprises.com/v1/rates/trm/co',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        // Ejecutamos curl
        $response = curl_exec($curl);

        // Cerramos conexión curl
        curl_close($curl);

        // Retornamos respuesta curl
        return array('TRMCO' => $response);

    }

}
