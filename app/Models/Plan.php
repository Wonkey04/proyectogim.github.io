<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
     
    
    
    // Nombre de la tabla en la base de datos
     protected $table = 'plan';

     // Los atributos que se pueden llenar masivamente (si los hay)
     protected $fillable = ['id_usuario', 'ejercicios', 'peso', 'repeticiones', 'series','fecha'];
 
     // Relaciones con otros modelos, si las hay
     // Ejemplo: un plan pertenece a un usuario
     public function usuario() {    
         return $this->belongsTo(User::class,'id_usuario');
     }
}
