<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Test de Fuerza Pendientes') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">

              <div class="mb-4">
                  <form action="{{ route('test.search') }}" method="GET">
                      @csrf
                      <label for="search" class="sr-only">Buscar por Nombre</label>
                      <input type="text" id="search" name="search" placeholder="Buscar por Nombre"
                          class="p-2 border border-gray-300 rounded focus:outline-none focus:border-red-700"
                          oninput="searchTests()">
                      <button type="submit" class="ml-2 bg-red-700 text-white p-2 rounded">Buscar</button>
                  </form>
              </div>

              <table id="testTable"
                  class="min-w-full bg-white border border-gray-300 rounded-lg overflow-hidden">
                  <thead class="bg-red-900 text-white">
                      <tr >
                          <th class="py-2 px-4 border-b">ID</th>
                          <th class="py-2 px-4 border-b">Nombre del Test</th>
                          <th class="py-2 px-4 border-b">Fecha de Creación</th>
                          <!-- Agrega más encabezados según sea necesario -->
                      </tr>
                  </thead>
                  <tbody>
                      <!-- Aquí se llenarán dinámicamente los datos desde Laravel -->
                        
                      @if(isset($allTest) && $allTest->count() > 0)
                      @foreach ($allTest as $test)
                          <tr class="tests">
                              <td class="py-2 px-4 border-b">{{ $test->test_id }}</td>
                              <td class="py-2 px-4 border-b">{{ $test->user_name }}</td>
                              <td class="py-2 px-4 border-b">{{ $test->fecha }}</td>
                          </tr>
                      @endforeach
                      @else
                  <p>No se encontraron resultados.</p>
                    @endif
                  </tbody>
              </table>

          </div>
      </div>
  </div>

  <script>
       function searchTests() {
        const searchTerm = document.getElementById('search').value.toLowerCase();
        const testTable = document.getElementById('testTable');
        const tbody = testTable.querySelector('tbody');

        // Restablecer la tabla al estado original si la búsqueda está vacía
        if (searchTerm === "") {
            // Puedes llenar la tabla con los datos originales aquí
            return;
        }

        // Realizar una solicitud al backend para obtener los resultados de búsqueda
        axios.get(`/buscar-tests?search=${searchTerm}`)
            .then(response => {
                // Verificar si la respuesta tiene el formato esperado
                
                if (response.data) {

                let data = Object.values(response.data);
                console.log(data); // Actualizar la tabla con los resultados de la búsqueda
                    tbody.innerHTML = '';

                    // Agregar los resultados a la tabla
                    response.data.forEach(test => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td class="py-2 px-4 border-b">${test.test_id}</td>
                            <td class="py-2 px-4 border-b">${test.user_name}</td>
                            <td class="py-2 px-4 border-b">${test.fecha}</td>
                        `;
                        tbody.appendChild(row);
                    });
                } else {
                    console.error('Error en el formato de la respuesta:', response);
                }
            })
            .catch(error => {
                // Manejar errores de la solicitud
                console.error('Error al realizar la solicitud:', error);
            });
    }
  </script>

</x-app-layout>
