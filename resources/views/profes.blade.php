<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   
                    <div class="container">
                        
                        <h2 class="text-black-200">Solicitudes de Profesor</h2>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                        @if(!empty($solicitudes))
                            <table class="w-full border border-collapse table-auto">
                                <thead>
                                    <tr>
                                        <th class="border p-2">Nombre</th>
                                        <th class="border p-2">Email</th>
                                        <th class="border p-2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($solicitudes as $solicitud)
                                    
                                    
                                    <tr>
                                        
                                            <td class="border p-2 flex-1">{{ $solicitud->name }}</td>
                                            <td class="border p-2 flex-1">{{ $solicitud->email }}</td>
                                            <td class="border p-2 flex-1">
                                                <form method="post" action="{{ route('aceptar.solicitud',  $solicitud->id) }}">
                                                    @csrf
                                                   <div class="text-center">
                                                    <button type="submit" class="bg-green-500 text-green w-20 px-3 py-2">Aceptar</button>
                                                </div>
                                                </form>
                                               
                                                <form method="post" action="{{ route('rechazar.solicitud', ['id' => $solicitud->id]) }}">
                                                    @csrf
                                                    <div class="text-center">
                                                    <button type="submit" class="bg-red-500 text-green w-20 px-3 py-2">Rechazar</button>
                                                </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No hay solicitudes de profesor en este momento.</p>
                        @endif
                        
                    </div>


                </div>
            </div>
        </div>
    </div>


</x-app-layout>