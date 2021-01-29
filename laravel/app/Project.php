<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Por defecto eloquent va tomar el nombre del modelo, lo va convertir en plural
    // y en minusculas, en este caso la tabla sera `projects`

    // En caso de que la convension no funcione, siempre se puede definir manualmente
    // protected $table = "projects";

    // En el modelo Project agregar la propiedad `fillable`
    // y dentro de el agregar los campos que se agregaran masivamente
    /* protected $fillable = [
        'title',
        'url',
        'description'
    ]; */

    // Todos los campos se van a guardar en la base de datos
    protected $guarded = [];

    // Sobrescribiendo el metodo `getRouteKeyName` en la clase Project
    public function getRouteKeyName()
    {
        return 'url';
    }
}
