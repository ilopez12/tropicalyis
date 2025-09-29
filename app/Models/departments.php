<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class departments extends Model
{
    protected $table= 'departments';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
      'name',
    ];

    protected $casts = [
      'name' => 'string',
    ];

    public static function create($formData){
      $payload = [
        'name' => $formData['name'] ,

      ];
      return DB::transaction(function () use ($payload) {
        $department = static::query()->create($payload); 
        if (! $department->exists) {
            throw new \RuntimeException('No se pudo crear el departamento');
        }
        return $department->fresh();
      });

    }

    public static function getAllDepartments(){
      return departments::get();
    }
}