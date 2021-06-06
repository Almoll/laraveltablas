@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url ('/juego') }}" method="post" enctype="multipart/form-data">
@csrf 
@include('juego.form',['modo'=>'Crear']);

</form>
</div>
@endsection