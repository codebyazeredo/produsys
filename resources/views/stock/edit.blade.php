@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        @include('stock._form', ['stockMovement' => $stockMovement])
    </div>
@endsection
