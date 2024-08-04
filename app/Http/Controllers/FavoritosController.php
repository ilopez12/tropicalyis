<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Favoritos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function favoritos(Request $data){
		return Favoritos::getbyuser($data->id);
	}
	public function addfavoritos(Request $data){
		
		try{
            Favoritos::create($data, Auth::user()->id);
			return 0;
		}catch(Exception $ex){
			dd($ex);
			return 1;
		}
	}
    public function actualizaFav(Request $data){
		
		try{
            Favoritos::changestatus($data, Auth::user()->id);
			return 0;
		}catch(Exception $ex){
			dd($ex);
			return 1;
		}
	}
}
