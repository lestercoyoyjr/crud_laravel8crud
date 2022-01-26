<!--This is our main page, what we're going to show at the begining-->

@extends('layouts.plantillabase');

@section('contenido')
{{--Here we say that when we press Crear button, it will
    go to create.blade.php where we have all views to show for 
    create--}}
<a href="articulos/create" class="btn btn-primary">Crear</a>  

<!--We're gonna create our table-->
<table class="table table-dark table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Codigo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articulos as $articulo)
            <tr>
                <td>{{$articulo->id}}</td>
                <td>{{$articulo->codigo}}</td>
                <td>{{$articulo->descripcion}}</td>
                <td>{{$articulo->cantidad}}</td>
                <td>{{$articulo->precio}}</td>
                <!--Here we put our Edit & Delete buttons-->
                <td>
                    <!--This form is to Delete-->
                    <!--We have to use 'Destroy' method to delete-->
                    <form action="{{route('articulos.destroy', $articulo->id)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a href="/articulos/{{$articulo->id}}/edit" class="btn btn-info">Editar</a>
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection