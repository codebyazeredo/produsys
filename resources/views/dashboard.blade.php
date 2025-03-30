@extends('layouts.app')

@section('content')
    <div class="grid gap-6">
        @include('components.stats')
    </div>

    <div class="grid gap-6">
        @include('components.movimentacoes')
    </div>

    <div class="grid gap-6">
        @include('components.avisos')
    </div>

    <div class="grid gap-6 lg:grid-cols-2 sm:grid-cols-1 mt-6">
        <div>
            @include('components.graficos')
        </div>
        <div>
            @include('components.acoes-rapidas')
        </div>
    </div>
@endsection
