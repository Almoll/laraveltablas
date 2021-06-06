@extends('layouts.app')
@section('content')
<style>

body {
  background-image: url('/img/ajedrez.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

</style>
<div class="container">




@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{ Session::get('mensaje')}}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <sapan aria-hidden="true"> &times; </span>
      </button>


      </div>
@endif



<a href="{{ url('categoria/create') }}" class="btn btn-success" >Registrar nueva categoria</a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Categoria</th>
            <th>Subcategoria</th>
            <th>genero</th>
            <th>ejemplos</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $categorias as $categoria)
        <tr>
            <td>{{ $categoria->id }}</td>

            <td>
            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$categoria->Foto }}" width="100"  alt="">
            </td>

            <td>{{ $categoria->Categoria }}</td>
            <td>{{ $categoria->Subcategoria }}</td>
            <td>{{ $categoria->genero }}</td>
            <td>{{ $categoria->ejemplos }}</td>
            <td>

            <a href="{{ url('/categoria/'.$categoria->id.'/edit') }}" class="btn btn-warning" >
            Editar 

            </a>
            | 


            <form action="{{ url('/categoria/'.$categoria->id) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
           <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

            </form>

             </td>
        </tr>
        @endforeach

    </tbody>

</table>
{!! $categorias->links() !!}
</div>
@endsection