@extends('layouts.guest')

@section('content')
    <div class="container mx-auto h-full flex flex-1 justify-center items-center">
        <div class="w-full max-w-lg">
            <div class="leading-loose">
                <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('login') }}">
                    @csrf

                    <x-application-logo/>

                    <div class="">
                        <label class="block text-sm text-gray-600" for="email">Email</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" required placeholder="Email" aria-label="email" :value="old('email')" autofocus>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="password">Senha</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" required placeholder="*******" aria-label="password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-4 items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">Lembrar-me</span>
                        </label>
                    </div>

                    <div class="mt-4 flex justify-between items-center">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Entrar</button>
                        @if (Route::has('password.request'))
                            <a class="inline-block text-sm text-gray-500 hover:text-blue-800" href="{{ route('password.request') }}">
                                Esqueceu a senha?
                            </a>
                        @endif
                    </div>

                    <div class="mt-4 text-center">
                        <a class="inline-block font-bold text-sm text-gray-500 hover:text-blue-800" href="{{ route('register') }}">
                            Ainda não é registrado?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
