<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function group()
{
    return $this->hasMany(Group::class, 'id_sucursal');
}


public function groups_id()
    {
        return $this->belongsTo(User::class, 'groups_id');
    }


   // protected $table ='user_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'groups_id', 
        'id_sucursal'
    ];
    public function solicitudProfesor()
    {
        return $this->hasMany(SolicitudProfesor::class, 'id', 'groups_id');
        //return $this->hasMany(SolicitudProfesor::class, 'groups_id', 'verificacion');
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }
    public function planes() {
        return $this->hasMany(Plan::class, 'id_usuario');
    }
    public function actualizarGroup($id){

        $this->update(['verificacion' => 1]);
        

    }



    public function groups()
    {
        return $this->belongsTo(Group::class, 'groups_id');
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'id_sucursal');
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
// En el modelo User.php


    // Otras partes del modelo...

    
    

   //   


   public function userGroups()
    {
        return $this->hasOne(UserGroups::class,  'id_usuario','groups_id');
    }

}
