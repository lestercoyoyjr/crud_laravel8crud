@extends('adminlte::page')

@section('title', 'Laravel 8 CRUD')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')
<form action="/articulos/{{$articulo->id}}" method="POST">
    <!--This is to evite a CSRF-->
    @csrf
    @method('PUT')

    {{--
        PLEASE don't forget to change from 'tabindex' to 'value' 
        because we're not putting a value anymore, but we're bringing it
    --}}

    <div class="mb-3">
        <label for="" class="form-label">Codigo</label>
        <input id="codigo" name="codigo" type="text" class="form-control" value="{{$articulo->codigo}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" value="{{$articulo->descripcion}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cantidad</label>
        <input id="cantidad" name="cantidad" type="number" class="form-control" value="{{$articulo->cantidad}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input id="precio" name="precio" type="number" step="any"  class="form-control" value="{{$articulo->precio}}">
    </div>
    <!--Cancel button-->
    <a href="/articulos" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-dark" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop