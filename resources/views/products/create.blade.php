@extends('app')

@section('content')
<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <input type="text"
            name="name"
            class="w-full py-2 px-2 border border-gray-300 rounded mb-4"
            placeholder="Escribe el nombre del producto">

    <input type="submit"
            value="Guardar"
            class="w-full bg-blue-600 rounded text-white px-4 py-2">
</form>

<a href="{{ route('products.index') }}" class="text-blue-600">Volver</a>
@endsection
