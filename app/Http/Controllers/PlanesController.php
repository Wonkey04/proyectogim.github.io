<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Facades\DB;


class PlanesController extends Controller
{

    public function view(){

        if (auth()->check()) {
            // Verificar los criterios para la autenticación
            if (auth()->user()->groups_id != 1 || auth()->user()->verificacion !== 1) {
                // Redirigir a la página de inicio de sesión
                return redirect()->route('login');
            } else {
                // Obtener y pasar los datos de los planes a la vista
                $planes = DB::table('users as u')
               ->join('plan as p', 'u.id', '=', 'p.id_usuario')
               ->select('u.name', 'u.surname', 'p.id_usuario', 'p.fecha','p.id_plan')
               ->get();
                return view('planes.planes', compact('planes'));
            }
        } else {
            // Si el usuario no está autenticado, redirigir a la página de inicio de sesión
            return redirect()->route('login');
        }

    }



    public function show($id_usuario) {
     // Imprime la consulta SQL

        $resultados = DB::table('users as u')
                    ->join('plan as p', 'u.id', '=', 'p.id_usuario')
                    ->select('u.name', 'u.surname', 'p.id_usuario', 'p.ejercicio', 'p.peso', 'p.repeticiones', 'p.series', 'p.fecha')
                    ->where('u.id', $id_usuario)
                    ->get();
        
                   
        return view('planes.planusuario', compact('resultados'));
    }

    public function crearView(){
        if (auth()->check()) {
            // Verificar los criterios para la autenticación
            if (auth()->user()->groups_id != 1 || auth()->user()->verificacion !== 1) {
                // Redirigir a la página de inicio de sesión
                return redirect()->route('login');
            } else {
                return view('planes.crearplan');
            }
        } else {
            // Si el usuario no está autenticado, redirigir a la página de inicio de sesión
            return redirect()->route('login');
        }
    }
}
