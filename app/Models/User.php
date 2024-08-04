<?php

namespace App\Models;

use Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    public $timestamps = false;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'telefono',
        'password',
        'rol',
        'estatus',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getmenubycelular($id){
        $query = User::where('email',$id)
                    ->first();

       return $query;
    }

    public static function resetpass($id, $pass, $usuario){
        $user = User::find($id);

        $user->password = $pass;
        $user->resetpass_at = date(now());
        $user->reset_user = $usuario;
        $user->estatus = 'ACTIVO';

        $user->save();
        // dd($user);
        return $user; 
       
    }
    public static function bloquear($id, $bloqueo){
        $user = User::find($id);
        $user->bloqueo = $bloqueo;

        $user->save();
        return $user; 
       
    }
    public static function changestatus($id, $estado){
        $user = User::find($id);
        $user->estatus = $estado;

        $user->save();

        return $user; 
       
    }
    public static function create($data, $pass, $estado){

            $table = new User();
            $table->name = $data->nombre;
            $table->email = $data->celular;
            $table->telefono = $data->celular;
            $table->rol = 1;
            $table->estatus = $estado; 
            $table->password = $pass;
            $table->departamento = $data->depto;
            $table->bloqueo = 0;
            $table->save();
            return $table;
       
    }

    public static function getall(){
        $user = User::get();

        return $user;
    }

   
}
