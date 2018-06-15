@extends('master')
@section('content')
<div class="container" style="position:absolute; top:60px; left:60px; background-color: #ffff; padding: 50px; border-radius:5px;">
  <div class="row">
    <h1>Nueva Noticia</h1> <br>
    <hr>
      <div class="form-group col-md-4">
        <label for="modTitulo">Titulo:</label>
        <input id="identificador" type="hidden" name="" value="">
        <input type="text" class="form-control" id="modTitulo" required>
      </div>
      <div class="form-group col-md-4">
        <label for="user_role">Autor:</label>
        <select id="user_role" name="role" value="" class="form-control">
             <option value="0">Elija un autor...</option>
             @foreach($user as $item)
                 <option value="{{$item->id}}">{{$item->name}}&nbsp;{{$item->last_name}}</option>
             @endforeach
         </select>
      </div>
      <div class="form-group col-md-4">
        <label for="modFecha">Fecha:</label>
        <input type="text" class="form-control" id="modFecha" placeholder="yyyy-mm-dd" required>
      </div>
      <div class="form-group col-md-12">
        <label for="texto">Texto:</label>
        <textarea id="textAr" class="form-control" name="name" rows="8" cols="80"required></textarea>
      </div>
      <div class="form-group">
        <div class="control-label col-md-6" id="drop" >

          <label for="drop">Imagen:</label>
           <div class="dropzone dropzone-file-area" id="my-dropzone" style="width: 100%; height: 150px; margin-bottom: 50px; border-width: 4px; border-color: rgb(54, 198, 211);">
               <h3 class="sbold">Arrastre aquí su archivo para adjuntarlo</h3>
               <div class="fallback">
                   <input name="file" type="file" id="file_" multiple required>
               </div>
           </div>
       </div>
       <div class="col-md-6">
         <label for="nota">*Nota:</label>
        <input id="imageUrl" type="text" class="form-control" disabled required>
        <div class="textoAyuda normal_text" style="color:rgb(0, 190, 13)">

        </div>
       </div>
      </div>
      <button id="agregar" type="button" class="btn btn-info btn-block">Agregar nueva noticia</button>

  </div>
</div>

@endsection
