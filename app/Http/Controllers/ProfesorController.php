<?php
namespace App\Http\Controllers;

use App\Models\User;
    use App\Models\Profesor;
    use App\Models\SolicitudProfesor;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;



    class ProfesorController extends Controller
    {

    public function vistaProfes()
    {
        // Verificar si el usuario actual cumple con los criterios de profesor
        if (auth()->user()->groups_id != 1 || auth()->user()->verificacion !== 1) {
            // Redirigir a la página de login
            return redirect()->route('login');
        }
        
    
            $solicitudes = SolicitudProfesor::where('groups_id', 1)
                                            ->where('verificacion', 0)
                                            ->get();
        
        
        return view('profes', compact('solicitudes'));
    }

    public function actualizarVerificacion($id){
    // Verifica que el usuario sea un administrador
    $usuario = auth()->user();

    if ($usuario->groups_id != 1) {
        return redirect()->back()->with('error', 'No tienes permisos para realizar esta acción');
    }

    // Encuentra el registro por ID
    $registro = User::find($id);

    // Verifica si el registro existe
    if (!$registro) {
        return redirect()->back()->with('error', 'El registro no existe');
    }

    // Realiza la modificación del dato de verificación
    $registro->verificacion = !$registro->verificacion; // Cambia esto según tu estructura

    // Guarda los cambios
    $registro->save();

    // Redirige de nuevo a la página con un mensaje de éxito o error
    $mensaje = $registro->verificacion ? 'Dato verificado correctamente' : 'Dato desverificado correctamente';

    return redirect()->back()->with('success', $mensaje);

    }
    public function anularVerificacion($id){

    // Verifica que el usuario sea un administrador
    $usuario = auth()->user();

    if ($usuario->groups_id != 1) {
        return redirect()->back()->with('error', 'No tienes permisos para realizar esta acción');
    }

    // Encuentra el registro por ID
    $registro = User::find($id);

    // Verifica si el registro existe
    if (!$registro) {
        return redirect()->back()->with('error', 'El registro no existe');
    }

    // Realiza la modificación del dato de verificación
    $registro->groups_id = 2; // Cambia esto según tu estructura

    // Guarda los cambios
    $registro->save();

    // Redirige de nuevo a la página con un mensaje de éxito o error
    $mensaje = $registro->verificacion ? 'Dato verificado correctamente' : 'Dato desverificado correctamente';

    return redirect()->back()->with('success', $mensaje);


    }

        public function verificarProfesores()
        {
            // Obtener la lista de profesores pendientes de verificación
            $profesoresPendientes = Profesor::where('verificado', false)->get();

            // Devolver la vista con la lista de profesores pendientes
            return view('verificacion_profesores', ['profesoresPendientes' => $profesoresPendientes]);
        }

        public function verificarProfesor($id)
        {
            // Encontrar al profesor por su ID
            $profesor = Profesor::find($id);

            if (!$profesor) {
                // Manejar el caso en que el profesor no sea encontrado
                abort(404, 'Profesor no encontrado');
            }

            // Marcar al profesor como verificado
            $profesor->update(['verificado' => true]);

            // Redirigir a la lista de profesores pendientes con un mensaje
            return redirect()->route('verificar.profesores')->with('mensaje', 'Profesor verificado correctamente.');
        }

    }
