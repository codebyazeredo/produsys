@extends('layouts.guest')

@section('content')
    <div class="container mx-auto h-full flex flex-1 justify-center items-center">
        <div class="w-full max-w-lg">
            <div class="leading-loose">
                <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('register') }}">
                    @csrf
                    <p class="text-gray-800 font-medium text-center text-lg font-bold">Cadastro</p>

                    <div>
                        <label class="block text-sm text-gray-600" for="name">Nome</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required placeholder="Nome" aria-label="name" :value="old('name')" autofocus>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm text-gray-600" for="email">Email</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" required placeholder="Email" aria-label="email" :value="old('email')">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm text-gray-600" for="password">Senha</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" required placeholder="*******" aria-label="password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm text-gray-600" for="password_confirmation">Confirmar Senha</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="password_confirmation" name="password_confirmation" type="password" required placeholder="*******" aria-label="password_confirmation">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="mt-4 flex items-center justify-between">
                        <x-primary-button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
                            {{ __('Registrar') }}
                        </x-primary-button>

                        <a class="inline-block text-sm text-gray-500 hover:text-blue-800" href="{{ route('login') }}">
                            Já tem uma conta? Faça login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
