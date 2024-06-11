<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroups extends Model
{
    use HasFactory;

    protected $table = 'user_groups';

    protected $fillable = [
        'groups_id',
        'id_usuario',
    ];
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class)->where('solicitud_profesor', true);
    }

}
