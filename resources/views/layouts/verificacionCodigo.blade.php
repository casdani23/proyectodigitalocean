<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('dashboard') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="verificacion" :value="__('inputLogin')" />
            <x-text-input id="verificacion" class="block mt-1 w-full" type="number" name="inputLogin" :value="old('inputLogin')"/>
        </div>

       
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" >
                </a>
            @endif

            <x-primary-button class="ml-3">
               Verificar Codigo
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
