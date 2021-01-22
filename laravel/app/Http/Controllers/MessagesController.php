<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    function store(/* Request $request */)
    {
        // return $request->get('email');
        // return $request;
        // return "Procesar el formulario";

        // Otra forma más simple
        return request('name');
    }
}
