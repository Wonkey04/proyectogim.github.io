<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\Test;
use App\Http\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function testView(Request $request)
    {
        if (auth()->user()->groups_id != 1 || auth()->user()->verificacion !== 1) {
            // Redirigir a la página de login
            return redirect()->route('login');
        } else {
            $allTest = Test::all();
            $queries = DB::getQueryLog();
            dd($queries);
                     return view('test.test',compact('allTest'));
        }
    }

    public function searchTest(Request $request)
    {
        
            // Verifica si hay un usuario autenticado y cumple con las condiciones adicionales
            if (auth()->check() && auth()->user()->groups_id == 1 && auth()->user()->verificacion == 1) {
                $name = $request->input('name');
                $userId = Auth::id();
    
                // Realiza la búsqueda en la base de datos con la relación
                $tests = Test::join('users', 'test.id', '=', 'users.id')
                    ->where('users.id', $userId)
                    ->where('users.name', 'LIKE', "%$name%")
                    ->select('test.id as test_id', 'users.name as user_name', 'test.*')
                    ->get();
    
                // Devuelve la vista con los resultados
                return response()->json(['tests' => $tests]);
            } else {
                // El usuario no cumple con las condiciones, realiza la acción apropiada
                return response()->json(['error' => 'No autorizado'], 401);
            }
        
    }

}
