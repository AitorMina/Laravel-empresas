@extends('layout')
@section('main')

<!-- <mitabla filas_serializadas='@json($filas)' campos_serializados='@json($campos)' tabla='{{$tabla}}'> -->
<mitabla filas_serializadas="{{ json_encode($filas) }}" campos_serializados="{{ json_encode($campos) }}" tabla="{{ $tabla }}" />
@endsection
