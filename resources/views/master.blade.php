<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inicio</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
    <link href="{{ asset('/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/global/plugins/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/global/plugins/dropzone/basic.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/global/plugins/bootstrap-sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"> -->
    <style>
          body{
            background-color: #efecff;
            margin:0;
            padding: 0;
          }
          .normal_text{
            font-size:20px;
            text-align: justify;
            background-color: #fff;
          }
          .wrapper{
            z-index:-50;
          }
          nav{
            z-index: 18;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 80px;
            box-sizing: border-box;
            transition: .3s;
          }
          nav.black{
            background: rgba(10, 25, 50, 0.9);
            height: 60px;
            padding: 0 100px;
          }
          nav .logo{
            margin-left: 25px;
            padding: 5px 10px;
            border-radius:8px;
            float: left;
            font-size: 24px;
            transition: .3s;
            background-color: rgba(17, 19, 27, 0.86)
          }
          nav.black .logo{
            color: #ffff;
          }
          nav ul{
            list-style: none;
            float: right;
            margin: 0;
            padding: 0;
            display: flex;
          }
          nav ul li{
            list-style: none;
          }
          nav ul li a{
            line-height: 80px;
            color: #f2ff00;
            letter-spacing: 2px;
            padding: 12px 30px;
            margin-right: 30px;
            text-decoration: none;
            text-transform: uppercase;
            transition: .3s;
          }
          nav.black ul li a{
            color: white;
            font-size: 13px;
            padding:7px 30px;
            line-height: 60px;
          }
          nav ul li a:focus {
            outline: none;
          }
          nav ul li a.active{
            background: #E2472F;
            color: white;
          }
          section.sec1{
            margin-top: -20px;
            width: 100%;
            height: 100vh;
            background:linear-gradient(rgba(7, 33, 92, 0.84),
                                      rgba(0, 144, 158, 0.72)),
                        url({{ URL::to('/') }}/images/portada.jpg);
            background-size: cover;
            background-position: center;

          }
          section div.presentacion{
            margin-top: 250px;
            text-align: center;
            text-transform: uppercase;
            font-size:50px;
            letter-spacing: 6px;
            color: white;
          }
          section div hr{
            width: 60%;
          }
          .content{
            margin-top: 80px;
          }
          .auto-margin{
            margin: 10px auto;
          }
          .margin{
              margin-top: 30px;
          }
          .plano{
              background-color: #fffdfd;
              box-shadow: 2px 2px 6px rgba(0,0,0,0.2);;
              padding:5px;
          }
          .plano-titulo{
              padding-top: 5px;
          }
          .contenedor {
              width: 300px;
              height: 200px;
              overflow: hidden;
              margin: 10px;
              position: relative;
          }
          .contenedor > .crop {
              position:absolute;
              left: -100%;
              right: -100%;
              top: -100%;
              bottom: -100%;
              margin: auto;
              min-height: 100%;
              min-width: 100%;
              filter: brightness(95%);
              transition: 0s top, left, right,bottom,min-height,min-width,filter;
              transition-duration: 0.6s;
          }
          .contenedor > .crop:hover {
              cursor:pointer;
              position:absolute;
              left: -108%;
              right: -108%;
              top: -108%;
              bottom: -108%;
              margin: auto;
              min-height: 108%;
              min-width: 108%;
              filter: brightness(115%);
              transition-duration: 0.3s;

          }
          #area{
              position: fixed;
              margin-left: 200px;
              z-index:10;
          }

          .modalImagen {
              display: none;
              position: fixed;
              z-index: 20;
              padding: 55px;
              left: 0;
              top: 0;
              width: 100%;
              height: 100%;
              overflow: hidden;
              background-color: rgba(250,250,255,0.8);
          }
          .blurred{
              filter: blur(3px);
              z-index: -1;
          }

          .modal-contenido {

          }

          #caption {
              margin: auto;
              display: block;
              width: 80%;
              max-width: 700px;
              text-align: center;
              color: #ccc;
              padding: 10px 0;
              height: 150px;
          }
          .modal-contenido, #caption {
              animation-name: zoom;
              animation-duration: 0.6s;
              margin: auto;
          }
          @keyframes zoom {
              from {transform:scale(0)}
              to {transform:scale(1)}
          }
          .cerrar {
              position: absolute;
              top: 40px;
              right: 35px;
              color: black;
              font-size: 40px;
              font-weight: bold;
              transition: 0.3s;
          }
          .cerrar:hover,
          .cerrar:focus {
              color: #bbb;
              text-decoration: none;
              cursor: pointer;
          }
          .sweet-alert {
              z-index: 20000;
              box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
          }
          @media only screen and (max-width: 900px){
              .modal-contenido {
                  width: 100%;
              }
          }
  </style>
  </head>
  <body>
    <div class="wrapper">
      <nav>
        <div class="logo">
          <img src="{{ URL::to('/') }}/images/logo.png" width="90" alt="Logo">
        </div>
        <ul>
          <li><a id="inicio" href="{{ route('index.post') }}">Inicio</a></li>
          <li><a href="#">Categorias</a></li>
          <li><a class="active" href="{{ route('create.post') }}">Agregar Noticia</a></li>
        </ul>
      </nav>
      <section class="sec1">
        <div class="presentacion col-md-12">
          <h1>Las noticias del momento</h1>
          <hr>
          <h3>Jesus Daniel Acosta Contreras</h3>
        </div>
      </section>
    </div>
    <hr>

    @yield('content')
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="{{ asset('/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('/assets/global/plugins/dropzone/dropzone.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js')}}" type="text/javascript"></script>
    <script>
      $(window).on('scroll',()=>{
        if ($(window).scrollTop()) {
            $('nav').addClass('black');
        }else{
            $('nav').removeClass('black');
        }
      })
      $(document).on('click','#myImg',function(){
        let nombre = $(this).data('nombre');
        let titulo = $(this).data('titulo');
        let autor = $(this).data('autor');
        let apellido = $(this).data('apellido');
        let texto = $(this).data('text');
        let fecha = $(this).data('fecha');
         $('#myModal').css("display","block");
         $('#autor-post').text('por ' + autor + " " + apellido);
         $('#titulo-post').text(titulo);
         $('#text-post').text(texto);
         $('#fech').html(fecha);
         console.log('nombre: '+nombre);
        $('#img-show').attr({src: '{{ URL::to('/') }}/images/'+nombre});
         $({blurRadius: 0}).animate({blurRadius: 4}, {
               duration: 800,
               easing: 'linear',
               step: function() {
                   $('.container').css({
                       "-webkit-filter": "blur("+this.blurRadius+"px)",
                       "filter": "blur("+this.blurRadius+"px)"
                   });
               }
           });
      });
      $(document).on('click', '.cerrar', function() {
            $('#myModal').css("display","none");
            $({blurRadius: 5}).animate({blurRadius: 0}, {
                duration: 250,
                easing: 'linear',
                step: function() {
                    $('.container').css({
                        "filter": "blur("+this.blurRadius+"px)"
                    });
                }
            });
        });
      $(document).on('click', '#borrar',function() {
        var id=$(this).data('id');
        swal({
                    title: '¿Desea eliminar la noticia actual?',
                    type: 'warning',
                    showCancelButton: true,
                    showConfirmButton: true,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }, function (isConfirm){

                  var route = "{{ route('delete.post')}}";
                  if(isConfirm){
                    $.ajax({
                         url: route,
                             headers: {
                                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             },
                         data: {'id': id},
                         type: 'POST',
                         success: function (data) {
                              console.log(data);
                              $('#num'+id).html('')
                              swal("Eliminado correctamente!", "", "success");

                              window.location.reload();

                         },
                         error: function (data) {
                             console.log(data );
                         }
                     });
                  }
                });

      });
      $(document).on('click','#modificar',function(){
          let id=$(this).data('id');
          let titulo=$('#num'+id+"> div > div > h4").text();
          let autor=$('#num'+id+'>div > div >span.autor_').data('iduser');
          let fecha=$('#num'+id+'>div > div >span.fecha_').text();
          let texto=$('#num'+id+'>div > div.texto_').data('text');
          let imagen=$('#num'+id+'>div > div > div > img').attr('src');
          let imagenSrc=$('#num'+id+'>input').val();
           $('#identificador').val(id);
          $('#modTitulo').val(titulo);
          $('#user_role').val(autor);
          $('#modFecha').val(fecha);
          $('#textAr').val(texto);
          $('#imagen_').attr('src',imagen);
          $('#imageUrl').val(imagenSrc);
      });
      $(document).on('click','#btn_mod',function(){
        let id = $('#identificador').val();
        let titulo = $('#modTitulo').val();
        let autor = $('#user_role option:selected').val();
        let fecha = $('#modFecha').val();
        let texto = $('#textAr').val();
        let img_src = $('#imageUrl').val();
        let route= "{{ route('update.post')}}";
        if(titulo=='' || texto=='' || img_src=='' || autor=='' || fecha==''){
          swal("Debe de rellenar todos los campos!", "", "error");

        }else{
        swal({
                    title: '¿Desea modificar la noticia actual?',
                    type: 'warning',
                    showCancelButton: true,
                    showConfirmButton: true,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }, function (isConfirm){
                  if(isConfirm){
                      $.ajax({
            url: route,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: { 'id': id,
                    'title':titulo,
                    'text':texto,
                    'img_src':img_src,
                    'user_id':autor,
                    'fecha':fecha
          },
            type: 'POST',
            success: function (data) {
               swal("Modificado correctamente!", "", "success");
                 window.location.reload();
            },
            error: function (data) {
                console.log(data );
            }
          });
                  }
                });
        }
      });
      $(document).on('click', '#continuar', function() {
          let id=$(this).data('id');
          $('.myImg'+id).trigger('click');
      });
    </script>
    <script>
      $(document).on('click','#agregar',function(){
        let titulo = $('#modTitulo').val();
        let texto = $('#textAr').val();
        let img_src = $('#imageUrl').val();
        let autor =  $('#user_role option:selected').val();
        let fecha = $('#modFecha').val();
        let route= "{{ route('create.new.post')}}";
        if(titulo=='' || texto=='' || img_src=='' || autor=='' || fecha==''){
          swal("Debe de rellenar todos los campos!", "", "error");
        }else{
          swal({
                      title: '¿Desea agregar esta noticia?',
                      type: 'warning',
                      showCancelButton: true,
                      showConfirmButton: true,
                      confirmButtonColor: '#3085d6',
                      confirmButtonText: 'Ok'
                  }, function (isConfirm){
                    if(isConfirm){
                      $.ajax({
                              url: route,
                                  headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                  },
                              data: {
                                'title':titulo,
                                'text':texto,
                                'img_src':img_src,
                                'user_id':autor,
                                'fecha':fecha
                                    },
                              type: 'POST',
                              success: function (data) {
                                console.log('functiona: ');
                                   swal("Noticia agregada correctamente!", "", "success");
                                   window.location.href=$('#inicio').attr('href');
                              },
                              error: function (data) {
                                  console.log(data );
                              }
                            });

                    }
                  });
        }
      });
      Dropzone.options.myDropzone = {

            url: "{{ route('imagenes.up') }}",
            headers: {
                'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
            },
            autoProcessQueue: true,
            uploadMultiple: true,
            parallelUploads: 20,
            maxFiles: 2,
            maxFilesize: 50,
            dictDefaultMessage: "",
            dictMaxFilesExceeded: "No puedes subir más archivos",
            dictInvalidFileType: "No se puede subir este tipo de archivo",
            dictFileTooBig: "El archivo es muy pesado",
            acceptedFiles: "image/*",

            init: function () {

                var wrapperThis = this;

                this.on("addedfile", function (file) {

                    console.log(file);

                    var removeButton = Dropzone.createElement("<button class='btn btn-xs btn-danger'><i class='fa fa-trash'></i></button>");

                    removeButton.addEventListener("click", function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        wrapperThis.removeFile(file);
                    });

                    file.previewElement.appendChild(removeButton);
                });

                this.on('sendingmultiple', function (data, xhr, formData) {

                });

                this.on("error", function (file, response) {
                      alert("error" + response);
                      console.log(response);

                    if (response == "No puedes subir más archivos") {
                        swal("¡Error!", "Solo se permite un archivo por orden", "error");
                    }
                    else if (response == "No se puede subir este tipo de archivo") {
                        swal("¡Error!", "No se puede subir este tipo de archivo", "error");
                    }
                    else if (response == "El archivo es muy pesado") {
                        swal("¡Error!", "El archivo es muy grande", "error");
                    }
                    else {
                        swal("¡Error!", "Hubo un error con su archivo", "error");
                    }
                    $('.textoAyuda').text('Error')
                    this.removeFile(file);
                    location.reload();
                });

                this.on("success", function (file, response) {
                    console.log(file['name']);
                    $('#imageUrl').val(file['name']);
                    $('.textoAyuda').text('Imagen seleccionada correctamente')

                  //  alert(response+file);
                    //swal("Solicitud enviada correctamente!", "", "success");
                });
            }
        };
    </script>
  </body>
</html>
