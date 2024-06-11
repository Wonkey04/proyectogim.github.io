<x-app-layout>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crear Plantilla</title>
        <!-- Agrega tus enlaces CSS si es necesario -->
    </head>
    <body class="bg-gray-100">
        <div class="container mx-auto p-8">
            <h1 class="text-3xl font-bold mb-6">Crear Plantilla de Entrenamiento</h1>
            
            <form action="" method="POST">
                @csrf
                <table class="w-full mb-6">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Día</th>
                            <th class="border px-4 py-2">Ejercicio</th>
                            <th class="border px-4 py-2">Series</th>
                            <th class="border px-4 py-2">Repeticiones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Día 1 - Ejercicio 1 -->
                        <tr>
                            <td class="border px-4 py-2">Día 1</td>
                            <td class="border px-4 py-2"><input type="text" name="ejercicio_dia1_1"></td>
                            <td class="border px-4 py-2"><input type="text" name="series_dia1_1"></td>
                            <td class="border px-4 py-2"><input type="text" name="repeticiones_dia1_1"></td>
                        </tr>

                        <!-- Repite para cada ejercicio -->

                        <!-- Día 1 - Ejercicio 2 -->
                        <tr>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2"><input type="text" name="ejercicio_dia1_2"></td>
                            <td class="border px-4 py-2"><input type="text" name="series_dia1_2"></td>
                            <td class="border px-4 py-2"><input type="text" name="repeticiones_dia1_2"></td>
                        </tr>

                        <!-- Repite para cada ejercicio hasta 8 -->

                    </tbody>
                </table>

                <!-- Botón de guardar -->
                <div class="mt-6">
                    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-full font-bold hover:bg-green-700">Guardar Plantilla</button>
                </div>
            </form>
        </div>
        <!-- Agrega tus scripts JS si es necesario -->
    </body>
    </html>
</x-app-layout>
