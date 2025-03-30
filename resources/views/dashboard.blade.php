@extends('layouts.app')

@section('content')
    <div class="grid gap-6">
        @include('components.stats')
    </div>

    <div class="grid gap-6 mt-6">
        @include('components.acoes-rapidas')
    </div>

    <div class="grid gap-6 mt-6">
        @include('components.movimentacoes')
    </div>

    <div class="grid gap-6 mt-6">
        @include('components.graficos')
    </div>

    <div class="grid gap-6 mt-6">
        @include('components.avisos')
    </div>
@endsection
