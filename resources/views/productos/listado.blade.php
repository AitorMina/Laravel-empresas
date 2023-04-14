@extends('layout')

@section('main')
    <x-a href="{{route('productos.create')}}">Crear Productos</x-a>
    <table class="table-auto">
        <caption>Listado de productos</caption>
        <tr>
            <th>Cod</th>
            <th>Nombre</th>
            <th>Nombre Corto</th>
            <th>Precio</th>
            <th>Familia</th>
        </tr>
        @foreach($productos as $producto)
            <tr>
                <td>{{$producto->cod}}</td>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->nombre_corto}}</td>
                <td>{{$producto->PVP}}</td>
                <td>{{$producto->familia}}</td>
                <td>
                    <x-a href="{{route('productos.edit',$producto->cod)}}">Editar</x-a>
                </td>
                <td>
                    <form action="{{route('productos.destroy',$producto->cod)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <x-borrar-button>Borrar</x-borrar-button>
                    </form>
                   </td>
            </tr>
        @endforeach
    </table>
    {{$productos->links()}}
@endsection
