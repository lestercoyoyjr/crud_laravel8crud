<!--This is our main page, what we're going to show at the begining-->

@extends('layouts.plantillabase')

<!--Here we're gonna work with with datatables-->
@section('css')
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
<!--End of datatables-->

@section('contenido')
{{--Here we say that when we press Crear button, it will
    go to create.blade.php where we have all views to show for 
    create--}}
<a href="articulos/create" class="btn btn-primary mb-3">Crear</a>  

<!--We're gonna create our table-->
<!--'id' in table is for datatables-->
{{--
    we can use this style 'class="table table-striped" style="width:100%"' or
    the one mentioned here. Style is indistinct
    --}}
<table id="articulos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
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

<!--This is for javascript-->
@section('js')

    <!--These files will add the index pagem search engine, etc. -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <!-- This will initiate our table functions -->
    <script>
        $(document).ready(function() {
            $('#articulos').DataTable({
                "lengthMenu": [[5, 10, 50, 100, -1], [5, 10, 50, 100, "All"]]
            });
        } );
    </script>

@endsection
<!--end javascript-->
@endsection