<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudProfesor extends Model
{

    public function user()
    {
       
        return $this->belongsTo(User::class, 'id', 'groups_id');
        //return $this->belongsTo(User::class, 'groups_id','verificacion');
    }

protected $fillable = ['groups_id', 'verificacion', /* Otros campos */];

protected $table = 'users'; // Ajusta según el nombre real de tu tabla en la base de datos

// Otras propiedades o métodos según tus necesidades
   
   
   
    // Otros métodos o propiedades según tus necesidades

    // Ejemplo de relación si tienes otra tabla para profesores
    public function profesor()
    {
        return $this->hasOne(Profesor::class);
    }

}
