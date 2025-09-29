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
                 ->leftJoin('departments', 'departments.id', '=', 'favoritos.department')
                 ->select('favoritos.*', 'departments.name as department_name')
                 ->get();

        return $query;
    }

    public static function create($data, $user){
        $table = new Favoritos();

        $table->nombre = $data->nombre;
        $table->usuario = $data->id;
        $table->descript = $data->descript;        
        $table->department = $data->department;
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
