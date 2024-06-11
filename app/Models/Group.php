<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // u otros campos necesarios
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'groups_id');
    }



        // En tu modelo User.php
public function group()
{
    return $this->belongsTo(Group::class, 'groups_id');
}
}
