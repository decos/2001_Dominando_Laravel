<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Por defecto eloquent va tomar el nombre del modelo, lo va convertir en plural 
    // y en minusculas, en este caso la tabla sera `projects`

    // En caso de que la convension no funcione, siempre se puede definir manualmente
    // protected $table = "projects";
}
