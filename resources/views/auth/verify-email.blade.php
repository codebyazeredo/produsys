@extends('layouts.guest')

@section('content')
    <div class="container mx-auto h-full flex flex-1 justify-center items-center">
        <div class="w-full max-w-lg">
            <div class="leading-loose">
                <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <p class="text-gray-800 font-medium text-center text-lg font-bold">Verifique seu e-mail</p>

                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Obrigado por se cadastrar! Antes de começar, poderia verificar seu endereço de e-mail clicando no link que acabamos de enviar para você? Caso não tenha recebido o e-mail, podemos enviar outro.') }}
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ __('Um novo link de verificação foi enviado para o e-mail que você forneceu durante o cadastro.') }}
                        </div>
                    @endif

                    <div class="mt-4 flex items-center justify-between">
                        <div>
                            <x-primary-button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
                                {{ __('Reenviar E-mail de Verificação') }}
                            </x-primary-button>
                        </div>

                        <div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Sair') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
