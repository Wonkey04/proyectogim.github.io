<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // u otros campos necesarios
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id_sucursal');
    }


    public function sucursal()
{
    return $this->hasMany(sucursal::class, 'id_sucursal');
}

}
