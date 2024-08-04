<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favoritos extends Model
{
    protected $table= 'favoritos';
    public $timestamps = false;
    use HasFactory;

    public static function getbyuser($id){
        $query = Favoritos::where('usuario', $id)
                 ->get();

        return $query;
    }

    public static function create($data, $user){
        $table = new Favoritos();

        $table->nombre = $data->nombre;
        $table->usuario = $data->id;
        $table->descript = $data->descript;
        $table->estado = 'ACTIVO';
        $table->created_at = date(now());
        $table->created_user = $user;

        $table->save();
        return $table;
    }

    public static function changestatus($data, $user){
        
        $table = Favoritos::find($data->id);
       
        $table->estado = $data->estado;
        $table->updated_at = date(now());
        $table->updated_user = $user;
        $table->save();
        // dd( $user);
        return $table; 
       
    }
}
