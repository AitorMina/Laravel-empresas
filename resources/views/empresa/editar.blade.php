@extends("layout")
@section("main")
    <fieldset class="m-20 p-5 bg-amber-100">
        <legend>Datos empresa {{$empresa->nombre}}</legend>
        <form action="{{route("empresas.update",$empresa->id)}}" method="POST">
            @csrf
            @method('PUT')
            ID<input type="text" name="id" value="{{$empresa->id}}" id=""><br/>
            Nombre<input type="text" name="nombre" value="{{$empresa->nombre}}" id=""><br/>
            Direccion<input type="text" name="direccion" value="{{$empresa->direccion}}" id=""><br/>
            <x-primary-button>Guardar</x-primary-button>


        </form>
    </fieldset>
@endsection
