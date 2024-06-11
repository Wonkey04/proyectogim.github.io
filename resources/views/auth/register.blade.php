<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>


        <!-- Surname -->
        <div>
            <x-input-label for="surname" :value="__('Apellido')" />
            <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="surname" />
            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
        </div>
        
        <!-- Rol -->
        <div>
            <x-input-label for="id_groups" :value="__('Group')" />
        
            <select id="id_groups" name="id_groups" class="block mt-1 w-full" required autofocus>
                @foreach ($groups as $group )
                 
                <option value="{{$group['id_groups']}}" {{ old('id_groups') === $group['id_groups'] ? 'selected' : '' }}>{{$group['name']}}</option>
                @endforeach
            </select>
        
            <x-input-error :messages="$errors->get('id_groups')" class="mt-2" />
        </div>

        <!-- Sucursal -->
        <div>
            <x-input-label for="id_sucursal" :value="__('Sucursal')" />
        
            @if (count($sucursal) > 0 )
                
            

            <select id="id_sucursal" name="id_sucursal" class="block mt-1 w-full" required autofocus>
                @foreach ($sucursal as $su )
                 
                <option value="{{$su->id_sucursal}}" {{ old('id_sucursal') === $su->id_sucursal ? 'selected' : '' }}>{{$su->direccion}}</option>
                @endforeach
            </select>
        @else
        <span class="text-red-500">No hay ninguna sucursal disponible.</span>
        @endif 
        <x-input-error :messages="$errors->get('id_sucursal')" class="mt-2" />
        </div>
        
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirma Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('¿Ya estas registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrarme') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
