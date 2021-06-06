@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/juego/' .$juego->id ) }}" method="post" enctype="multipart/form-data" >
@csrf
{{  method_field('PATCH') }}

@include('juego.form',['modo'=>'Editar']);

</form>
</div>
@endsection
