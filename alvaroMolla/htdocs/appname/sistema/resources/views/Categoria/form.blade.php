

<h1> {{ $modo }} categoria</h1>

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
    color: #FF8000;
}
body {
  background-image: url('/img/dado.webp');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

</style>
<div class="form-group">

<label for="Categoria">Categoria</label>
<select type="text" class="form-control" name="Categoria" value="{{isset($categoria->Categoria)?$categoria->Categoria:old('Categoria')}}"  id="Categoria" >
<option value="Videojuego">Videojuego</option> 
   <option value="juego de mesa">juego de mesa</option> 
   <option value="juego de mesa">juego de recreativa</option> 
   <option value="juego de mesa">juego tradicional</option> 
</select>

</div>

<div class="form-group">


<label for="Subcategoria">Subcategoria</label>
<select type="text"  class="form-control" name="Subcategoria" value="{{ isset($categoria->Subcategoria)? $categoria->Subcategoria: old('Subcategoria')}}"  id="Subcategoria" >
<optgroup label="Videojuego"> 
       <option value="online">online</option> 
       <option value="ofline">ofline</option> 
       <option value="online/ofline">online/ofline</option> 
   </optgroup> 
   <optgroup label="juego de mesa"> 
       <option value="Fichas de madera (Europeo)">Fichas de madera (Europeo)</option> 
       <option value="Fichas de plastico (Americano)">Fichas de plastico (Americano)</option> 
   </optgroup> 
   <optgroup label="juego de recreativa"> 
       <option value="Estadounidense">Estadounidense</option> 
       <option value="Japonesa">Japonesa</option> 
   </optgroup> 
   <optgroup label="juego tradicional"> 
       <option value="JUEGO FOLKLÓRICO">JUEGO FOLKLÓRICO</option> 
       <option value="JUEGO POPULAR">JUEGO POPULAR</option> 
   </optgroup> 
</select>

</div>

<div class="form-group">

<label for="genero">genero</label>
<input type="text"  class="form-control" name="genero" value="{{ isset($categoria->genero)? $categoria->genero:old('genero')}}"  id="genero" > 

</div>

<div class="form-group">

<label for="ejemplos">ejemplos</label>
<input type="text"  class="form-control" name="ejemplos" value="{{isset($categoria->ejemplos)?$categoria->ejemplos:old('ejemplos')}}"  id="ejemplos" >


</div>

<div class="form-group">

<label for="Foto"></label>
@if(isset($categoria->Foto))
<img  class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$categoria->Foto }}" width="100" alt="">
 @endif
<input type="file"  class="form-control" name="Foto" value=""  id="Foto" >


</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >

<a class="btn btn-primary" href="{{ url('categoria/') }}">Regresar</a>

