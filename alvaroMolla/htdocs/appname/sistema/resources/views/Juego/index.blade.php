@extends('layouts.app')
@section('content')
<style>

body {
  background-image: url('/img/v.jpg');
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



<a href="{{ url('juego/create') }}" class="btn btn-success" >Registrar nuevo juego</a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>NumJugadores</th>
            <th>Genero</th>
            <th>categoria</th>
            <th>subcategoria</th>
            <th>EdadRecomendada</th>
            <th>Acciones</th>
            
        </tr>
    </thead>

    <tbody>
        @foreach( $juegos as $juego)
        <tr>
            <td>{{ $juego->id }}</td>

            <td>
            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$juego->Foto }}" width="100"  alt="">
            </td>

            <td>{{ $juego->Nombre }}</td>
            <td>{{ $juego->NumJugadores }}</td>
            <td>{{ $juego->Genero }}</td>
            <td>{{ $juego->categoria->Categoria }}</td>
            <td>{{ $juego->categoria->Subcategoria }}</td>
            <td>{{ $juego->EdadRecomendada }}</td>
            <td>

            <a href="{{ url('/juego/'.$juego->id.'/edit') }}" class="btn btn-warning" >
            Editar 

            </a>
            | 


            <form action="{{ url('/juego/'.$juego->id) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
           <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

            </form>

             </td>
        </tr>
        @endforeach

    </tbody>

</table>
{!! $juegos->links() !!}
</div>
@endsection