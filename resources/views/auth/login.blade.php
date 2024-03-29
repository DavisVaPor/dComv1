<x-guest-layout class="">
    <x-jet-authentication-card>
        <x-slot name="logo" class="w-20">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="text-3xl text-center">
                <span class="font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-indigo-700">
                    INTRANET
                </span>
                <p class="text-blue-600 font-extrabold text-2xl">Dirección de Comunicaciones</p>
                
                
            </div>
            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('¿ Olvidaste tu contraseña ?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Ingresar') }}
                </x-jet-button>
            </div>
            <div class="mt-2 text-center text-xs">
                <p class="text-indigo-600">
                   Area de Informatica &copy; {{ date('Y') }}
               </p>
               <p class="text-indigo-600 font-bold">
                   Direccion Regional de Transportes y Comunicaciones-Amazonas
               </p>
              
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
