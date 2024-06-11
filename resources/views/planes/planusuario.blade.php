<x-app-layout>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detalles del Plan</title>
        <!-- Agrega tus enlaces CSS si es necesario -->
    </head>

    <body class="bg-black text-white">
        <div class="container mx-auto p-8">
            @if($resultados->count() > 0)
                <table class="table-auto w-full border border-white">
                    <thead>
                        <tr>
                            <th class="border border-white px-4 py-2">Nombre</th>
                            <th class="border border-white px-4 py-2">Ejercicio</th>
                            <th class="border border-white px-4 py-2">Peso</th>
                            <th class="border border-white px-4 py-2">Repeticiones</th>
                            <th class="border border-white px-4 py-2">Series</th>
                            <th class="border border-white px-4 py-2">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resultados as $resultado)
                            <tr>
                                <td class="border border-white px-4 py-2">{{ $resultado->name . ' ' . $resultado->surname }}</td>
                                <td class="border border-white px-4 py-2">{{ $resultado->ejercicio }}</td>
                                <td class="border border-white px-4 py-2">{{ $resultado->peso }}</td>
                                <td class="border border-white px-4 py-2">{{ $resultado->repeticiones }}</td>
                                <td class="border border-white px-4 py-2">{{ $resultado->series }}</td>
                                <td class="border border-white px-4 py-2">{{ $resultado->fecha }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-lg">No hay resultados disponibles.</p>
            @endif
        </div>
        <!-- Agrega tus scripts JS si es necesario -->
    </body>

    </html>
</x-app-layout>
