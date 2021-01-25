<?php

namespace App\Http\Controllers;

use App\Mail\MessageRecieved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    function store(/* Request $request */)
    {
        // return $request->get('email');
        // return $request;
        // return "Procesar el formulario";

        // Otra forma más simple
        $message = request()->validate([
            'name' => 'required',
            // 'email' => 'required | email'
            'email' => ['required', 'email'],
            'subject' => 'required',
            'content' => 'required|min:3',
        ], [
            'name.required' => __('I need your name')
        ]);

        // Usar el metodo `queue` en lugar de `send`
        // Nos ayudan a realizar procesos en segundo plano
        // Para utilizar `queue` debemos realizar una configuración adicional
        // Pero si no esta configurada utilizará por defecto `send`
        Mail::to('dabanto21@gmail.com')->queue(new MessageRecieved($message));

        // Imprimir el correo en el navegador
        // utilizando la instancia de la clase `mailable`
        // TODO: return new MessageRecieved($message);

        return "Mensaje Enviado";
    }
}
