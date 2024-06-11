<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SolicitudProfesor;

class ConfirmarProfes extends Controller
{
    // Controlador SolicitudProfesorController.php


public function aceptarSolicitud($id)
{
    $solicitud = SolicitudProfesor::find($id);

    // Lógica para aceptar la solicitud (puedes moverla al modelo si es más compleja)

    // Elimina la solicitud después de aceptarla
    $solicitud->delete();

    return redirect()->route('mostrar.solicitudes')->with('mensaje', 'Solicitud aceptada correctamente.');
}

public function rechazarSolicitud($id)
{
    $solicitud = SolicitudProfesor::find($id);

    // Lógica para rechazar la solicitud (puedes moverla al modelo si es más compleja)

    // Elimina la solicitud después de rechazarla
    $solicitud->delete();

    return redirect()->route('mostrar.solicitudes')->with('mensaje', 'Solicitud rechazada correctamente.');
}

}
