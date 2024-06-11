<x-app-layout>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Planes de Alumnos</title>
        <!-- Agrega tus enlaces CSS si es necesario -->
    </head>
    <body class="bg-gray-100">
        <div class="container mx-auto p-8">
            <h1 class="text-3xl font-bold mb-6">Lista de Planes de Alumnos</h1>
            <div class="flex items-center mt-4">
                <p class="text-black-500 text-lg font-bold mr-2">¿No encuentras el plan?</p>
                <a href="{{route('planes.crearplan')}}" class="bg-red-500 text-white px-10 py-2 rounded-full font-bold hover:bg-red-700">Crea Uno</a>
            </div>
            <br>
            @if(count($planes) > 0)
                <ul>
                    @foreach($planes as $plan)
                        <li class="bg-white rounded-lg shadow-md p-6 mb-6">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h2 class="text-xl font-semibold">{{ $plan->name.' '. $plan->surname }}</h2> 
                                </div>
                                <div>
                                    <p class="text-gray-500">{{ $plan->name }}</p>
                                    <p class="text-gray-500">Fecha del plan: {{ $plan->fecha }}</p>
                                </div>
                            </div>
                            <a href="{{ route('planes.planusuario', ['id_usuario' => $plan->id_usuario, 'id_plan' => $plan->id_plan]) }}) }}" class="text-blue-500 hover:underline">Ver más detalles</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-lg">No hay planes disponibles.</p>
            @endif
        </div>
        <!-- Agrega tus scripts JS si es necesario -->
    </body>
    </html>
</x-app-layout>
