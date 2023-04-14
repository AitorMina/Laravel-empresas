@extends("layout")
@section("main")

    <legend class="text-xl">Datos nuevo producto</legend>
    <form action="{{route("productos.update", $producto->cod)}}" method="POST">
        @method('PUT')
        @csrf
            Cod<input type="text" name="cod" value="{{$producto->cod}}" id=""><br/>
            Nombre<input type="text" name="nombre" id="" value="{{$producto->nombre}}"><br/>
            Nombre Corto<input type="text" name="nombre_corto" id="" value="{{$producto->nombre_corto}}"><br/>
            Descripcion<textarea name="descripcion">{{$producto->descipcion}}</textarea></br>
            Precio<input type="text" name="PVP" id="" value="{{$producto->PVP}}"><br/>
            Familia<input type="text" name="familia" id=""value="{{$producto->familia}}"><br/>
            <x-primary-button>Guardar</x-primary-button>
    </form>

@endsection
