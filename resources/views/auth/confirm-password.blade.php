@extends('layouts.guest')

@section('content')
    <div class="container mx-auto h-full flex flex-1 justify-center items-center">
        <div class="w-full max-w-lg">
            <div class="leading-loose">
                <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <p class="text-gray-800 font-medium text-center text-lg font-bold">Confirme sua senha</p>

                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Esta é uma área segura do aplicativo. Por favor, confirme sua senha antes de continuar.') }}
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600" for="password">Senha</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" required placeholder="*******" aria-label="password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-4 flex justify-end">
                        <x-primary-button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
                            {{ __('Confirmar') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
