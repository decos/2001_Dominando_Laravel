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
        request()->validate([
            'name' => 'required',
            // 'email' => 'required | email'
            'email' => ['required', 'email'],
            'subject' => 'required',
            'content' => 'required|min:3',
        ]);

        return "Datos validados";
    }
}
