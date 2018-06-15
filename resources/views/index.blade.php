@extends('master')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 normal_text">
      <h3>Periodismo</h3>
      <p>
        El perfil periodístico necesita de una investigación profunda, por eso está dentro de los géneros del nuevo periodismo o también llamado periodismo narrativo. El propósito del perfil es reflejar la realidad de una forma diferente en donde exista narración, diálogo y descripción. Se evita llegar a una biografía o a que se vuelva una entrevista (pregunta- respuesta). A diferencia de estos, el perfil no solo recoge la voz del personaje sino que también se reúnen las voces de amigos, familiares hasta de enemigos. Está escrito con los cinco sentidos del periodista, profundizándose en los detalles físicos y psicológicos desde la observación, la descripción de su vestuario, lo que proyecta (tranquilidad, nerviosismo, felicidad, armonía, entre otros), el aroma del sitio donde se encuentra, sabores y sensaciones. Además, se espera que a través del diálogo el personaje revele sus miedos, sus gustos, sus pasiones, sus tristezas, sus aventuras y sobre todo poder encontrar uno o más datos importantes dignos de publicar.
      </p>
    </div>
  </div>
  <div id="caja" class="row col-md-12">
    <div class="">
      <h1>Últimas noticias...</h1>
    </div>
      @foreach($post as $item)
      <div id="num{{$item->id}}"  align="center" class="col-md-4 margin">
                  <input type="hidden" name="" value="{{$item->img_src}}">
                  <div class="plano">
                    <div class="plano-titulo">
                      <h4 class="plano-titulo titulo_">{{$item->title}} </h4>
                    </div>
                    <div class="plano-body">
                      <div class="gallery contenedor">
                        <img id="myImg" class="myImg{{$item->id}}"  data-apellido="{{$item->last_name}}" data-titulo='{{$item->title}}' data-fecha="{{$item->fecha}}" data-autor="{{$item->name}}" data-text="{{$item->text}}" data-nombre="{{$item->img_src}}" src="{{ URL::to('/') }}/images/{{$item->img_src}}" class="img-thumbnail crop" width="280" alt=""><br>
                      </div>
                      <strong>  Autor: </strong><span data-iduser="{{$item->user_id}}" class="autor_">{{$item->name}}&nbsp;{{$item->last_name}}</span><br>
                      <strong>  Fecha: </strong><span class="fecha_">{{$item->fecha}}</span><br>
                    </div>
                    <div class="texto_" data-text="{{$item->text}}" style="margin-top:6px;">
                      {{substr($item->text,0,80) }}... <a id="continuar" href="#" data-id="{{$item->id}}">continuar leyendo</a>
                    </div>
                    <hr>
                    <div class="botones auto-margin">
                      <button id="borrar" data-id="{{$item->id}}" type="button" class="btn btn-danger btn-sm">&nbsp;Borrar</button>
                      <button id="modificar" data-id="{{$item->id}}" data-toggle="modal" data-target="#modalModify" type="button" class="btn btn-info btn-sm"><i class="fas fa-trash-alt"></i>&nbsp;Modificar</button>
                    </div>
                    </div>
      </div>
      @endforeach
  </div>
  <div class="row" align="center">
      <div id="render" class="auto-margin">
        {{$post->links("pagination::bootstrap-4")}}
      </div>
  </div>
</div>
<!-- Modal Modificar -->
<div class="modal fade" id="modalModify" role="dialog">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
       <h4 class="modal-title">Modificar Noticia</h4>
     </div>
     <form class="">
     <div class="modal-body">
         <div class="form-group col-md-4">
           <label for="modTitulo">Titulo:</label>
           <input id="identificador" type="hidden" name="" value="">
           <input type="text" class="form-control" id="modTitulo">
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
           <input type="text" class="form-control" id="modFecha">
         </div>
         <div class="form-group">
           <label for="texto">Texto:</label>
           <textarea id="textAr" class="form-control" name="name" rows="8" cols="80"></textarea>
           <label for="imagenMod">Imagen actual:</label>
               <img id="imagen_" src="" alt="No se cargo la imagen" class="img-thumbnail">
         </div>
         <div class="form-group">
           <div class="control-label col-md-6" id="drop" >

             <label for="drop">Nueva imagen:</label>
              <div class="dropzone dropzone-file-area" id="my-dropzone" style="width: 100%; height: 150px; margin-bottom: 50px; border-width: 4px; border-color: rgb(54, 198, 211);">
                  <h3 class="sbold">Arrastre aquí su archivo para adjuntarlo</h3>
                  <div class="fallback">
                      <input name="file" type="file" id="file_" multiple required>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
            <label for="nota">*Nombre:</label>
           <input id="imageUrl" type="text" class="form-control" disabled required>
           <div class="textoAyuda normal_text" style="color:rgb(0, 190, 13)">

           </div>
          </div>
         </div>
     </div>
     <div class="modal-footer">
       <button id="btn_mod" type="button" class="btn btn-info btn-block" >Modificar</button>
     </div>
   </form>
   </div>
 </div>
</div>
   <div id="myModal" class="modalImagen row col-md-12">
       <span class="cerrar">&times;</span>
       <div class="col-md-12">
           <img class="modal-contenido col-md-6" id="img-show" src="">
           <div id="body-post" class="col-md-6">
             <h1 id="titulo-post"></h1>
             <hr>
             <h2 id="autor-post"></h2>
             <div id="text-post"></div>
             <hr>
             <div id="fech">
               <strong>Fecha:</strong>
             </div>
           </div>
       </div>
       <div id="caption"></div>
   </div>

@endsection
