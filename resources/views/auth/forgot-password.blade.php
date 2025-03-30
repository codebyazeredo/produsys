@extends('layouts.guest')

@section('content')
    <div class="container mx-auto h-full flex flex-1 justify-center items-center">
        <div class="w-full max-w-lg">
            <div class="leading-loose">
                <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <p class="text-gray-800 font-medium text-center text-lg font-bold">Esqueceu sua senha?</p>

                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos um link de redefinição de senha para que você possa escolher uma nova.') }}
                    </div>

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <div>
                        <label class="block text-sm text-gray-600" for="email">Email</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" required placeholder="Email" aria-label="email" :value="old('email')" autofocus>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4 flex items-center justify-between">
                        <x-primary-button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
                            {{ __('Enviar link de redefinição de senha') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
