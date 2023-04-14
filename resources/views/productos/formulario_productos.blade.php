@extends("layout")
@section("main")

    <legend class="text-xl">Datos nuevo producto</legend>
        <form action="{{route("productos.store")}}" method="POST" class="container mx-auto bg-gray-100 flex">
    @csrf
            <fieldset class="display-block items-center">
            Cod<input type="text" name="cod" value="{{old('cod')}}" id=""><br/>
            Nombre<input type="text" name="nombre" id=""><br/>
        Nombre Corto<input type="text" name="nombre_corto" id=""><br/>
            Descripcion<textarea name="descripcion"></textarea></br>
        Precio<input type="text" name="PVP" id=""><br/>
        Familia<input type="text" name="familia" id=""><br/>
            <x-primary-button>Guardar</x-primary-button>
            </fieldset>
    </form>

@endsection
