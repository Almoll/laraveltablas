

<h1> {{ $modo }} juego</h1>

@if(count($errors)>0)

   <div class="alert alert-danger" role="alert">
    <ul>  
   @foreach( $errors->all() as $error)
   <li>{{ $error }}</li>
   @endforeach
   </ul>
   </div>
 
   

@endif

<style>
body {
    font-family: poppins;
    font-size: 16px;
    color: #24E61D;
}

body {
  background-image: url('/img/j.webp');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

</style>

<div class="form-group">

<label for="Nombre">Nombre</label>
<input type="text" class="form-control" name="Nombre" value="{{isset($juego->Nombre)?$juego->Nombre:old('Nombre')}}"  id="Nombre" >



</div>

<div class="form-group">


<label for="NumJugadores">NumJugadores</label>
<input type="text"  class="form-control" name="NumJugadores" value="{{ isset($juego->NumJugadores)? $juego->NumJugadores: old('NumJugadores')}}"  id="NumJugadores" >


</div>

<div class="form-group">

<label for="Genero">Genero</label>
<input type="text"  class="form-control" name="Genero" value="{{ isset($juego->Genero)? $juego->ApellidoSGeneroegundo:old('Genero')}}"  id="Genero" > 

</div>

<div class="form-group">

<label for="categoria_id">categoria</label>
<select name="categoria_id" id="categoria_id">
@foreach ($categorias as $key => $categoria)
            <option name="categoria_id" value="{{$categoria->id}}" id="categoria_id">{{$categoria->Categoria}}</option>
            @endforeach

</select>

</div>

<div class="form-group">

<label for="SUBcategoria_id">subcategoria</label>
<select name="SUBcategoria_id" id="SUBcategoria_id">
@foreach ($categorias as $key => $categoria)
            <option name="SUBcategoria_id" value="{{$categoria->id}}" id="SUBcategoria_id">{{$categoria->Subcategoria}}</option>
            @endforeach

</select>

</div>

<div class="form-group">

<label for="EdadRecomendada">EdadRecomendada</label>
<input type="text"  class="form-control" name="EdadRecomendada" value="{{isset($juego->EdadRecomendada)?$juego->EdadRecomendada:old('EdadRecomendada')}}"  id="EdadRecomendada" >


</div>

<div class="form-group">

<label for="Foto"></label>
@if(isset($juego->Foto))
<img  class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$juego->Foto }}" width="100" alt="">
 @endif
<input type="file"  class="form-control" name="Foto" value=""  id="Foto" >


</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >

<a class="btn btn-primary" href="{{ url('juego/') }}">Regresar</a>

