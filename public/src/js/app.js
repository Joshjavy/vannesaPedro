/***** Para carga de loading *****/
const onlyNumbers = document.querySelectorAll('.only-number')
const morePhotos = document.querySelector('#morePhotos')
const photos = document.querySelectorAll('[data-photos]')
const sideBar = document.querySelector('#iconArrow')
const sideBarSmall = document.querySelector('#iconHamburguer')
let audio = document.getElementById("player"); 

$(document).ready(function(){
  $('.sidenav').sidenav();
});

document.addEventListener("DOMContentLoaded", function(){
	$('.preloader-background').delay(1000).fadeOut('slow');
	$('.preloader-wrapper').delay(1000).fadeOut();

  if(onlyNumbers.length > 0){
    onlyNumbers.forEach(element => {
        element.addEventListener('input', e => {
            let data = onlyDecimalNumbers(e.target.value)
            e.target.value = data
            e.target.focus()
        })
    })
  }

  if(morePhotos){
    morePhotos.addEventListener('click', e => {
      e.preventDefault()
      Object.values(photos).forEach(photo => {
        photo.removeAttribute('hidden')
        photo.classList.add('d-flex', 'justify-content-center')
      })
      e.target.remove()
    })
  }

  // if(sideBar){
  //   sideBar.addEventListener('mouseover', openSideBar)
  // }
  
});

//Obtenemos elemento de la musica
//Contador para determinar cuantos clics hacen en la página, si hacen más de 1 ya no se reproducirá la musica en automatico
var contador_clics = 0;

//Si presionamos en cualquier parte de la página se reproducira la musica solo si el contador es = 0
$(document).on('click', 'body', function(evento)
{
    //Si el contador es = 0 entonces reproducimos la musica en automatico, sino solo hasta que presionen el icono
    if(contador_clics === 0)
    {
      if (!$(evento.target).closest('.pausarAudio').length) 
      {
        playAudio();
        contador_clics++;
      }
    }
});

//Funciones que se activan con un evento para pausar y reproducir la musica 
function playAudio() 
{ 
  audio.play(); 
} 
function pauseAudio() 
{ 
  audio.pause(); 
} 

const openSideBar = e => {
  $('.sidenav').sidenav('open')
}

const onlyDecimalNumbers = string => string.replace(/\$|\!|\¡|\#|\$|\%|\&|\=|\¿|\?|\\|\{|\}|\[|\]|\;|\:|\-|\_|\^|\*|\<|\>|\||\°|\¬|\@|\+|[A-z]+/g, '')

$(document).ready(function(){
  $('.carousel').carousel();
});


      AOS.init({offset:3,});

/***** Para el contador del tiempo *****/

      // Introducir la fecha y hora
      // var countDownDate = new Date("Nov 26, 2022 12:00:00").getTime();

      // Actualizar el contador cada segundo
      // var x = setInterval(function(){

      //   // Obtener la fecha actual
      //   var now = new Date().getTime();

      //   // La diferencia entre los dos tiempos
      //   var distance = countDownDate - now;

      //   // Calcular el tiempo
      //   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      //   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      //   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      //   var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      //   // Mostramos el tiempo en el id="timerCont"
      //   let idioma = document.querySelector('[data-language]')
      //   if(idioma){
      //     document.getElementById("timerCont").innerHTML = `${days} DAYS ${hours} HRS ${minutes} MIN ${seconds} SEC`;
      //   } else {
      //     document.getElementById("timerCont").innerHTML = `
      //       <span>${days} <br/>DÍAS</span> <span>${hours} <br/>HRS</span> <span>${minutes} <br/>MIN</span> <span>${seconds} <br/>SEG</span>
      //     `;
      //   }

      //   // si ya acacabo
      //   if (distance < 0) 
      //   {
      //     clearInterval(x);
      //     document.getElementById("timerCont").innerHTML = "¡¡Ya nos casamos!!";
      //   }
      // }, 1000);



/***** Para abrir la invitaciÃ³n en la web  *****/
      function on() 
      {
        document.getElementById("overlay").style.display = "block";
        document.querySelector('#video_invitacion').play()
            
      }
      function off() 
      {
        document.getElementById("overlay").style.display = "none";
        document.getElementById("video_invitacion").pause();
      }



/***** Para el cuestionario de salud *****/
$(document).on('click touch', '#enviarcuestionario', function(evento)
{

    // Capturamnos el boton de envÃ­o
    var btnEnviar = $("#enviarcuestionario");

    if ($("#nombre").val()=="" || $("#apellidos").val()=="" || $("#email").val()== "" || $("#telefono").val()== "" || $("#cancion").val()=="" || $("#alergias").val()=="" || $("#confirmacion_asistencia").val()==null) 
    {
      evento.preventDefault();
      alert("Por favor llena todos los campos antes de enviar el cuestionario.")
    }
    else
    {

        $.ajax({
          type: $("#confirmacion").attr("method"),
          url:  $("#confirmacion").attr("action"),
          data: $("#confirmacion").serialize(),
          beforeSend: function()
          {
              /*
              * Esta funciÃ³n se ejecuta durante el enviÃ³ de la peticiÃ³n al
              * servidor.
              * */
              

              btnEnviar.text("Enviando ..."); // Para input de tipo button
              btnEnviar.attr("disabled","disabled");
          },
          complete:function(data)
          {
              /*
              * Se ejecuta al termino de la peticiÃ³n
              * */
              btnEnviar.text("Enviado");
              /*btnEnviar.removeAttr("disabled");*/
          },
          success: function(data)
          {
            // console.log(data)
            if(data.status){
              $(".modal-content-msj").html('<p class="mb-0"><i class="fas fa-check-circle mr-2"></i><span>'+data.mensaje+'</span></p>');
              $(".modal-content-msj").addClass('white-text green darken-3');
              $("#modal_mensaje").modal('open');
              
            } else {
              $(".modal-content-msj").html('<i class="material-icons left">cancel</i><span>- Ocurrio un error inesperado, intentelo de nuevo más tarde');
              $(".modal-content-msj").addClass('white-text red darken-4');
              $("#modal_mensaje").modal('open');
            }

            setTimeout(function(){
                location.reload();
            },4000)
          },
          error: function(data)
          {
            console.log(data)
              /*
              * Se ejecuta si la peticÃ³n ha sido erronea
              * */
              setTimeout(function()
              {
                location.reload();
              },2500)

              $(".modal-content-msj").html('<i class="material-icons left">cancel</i><span>Ocurrio un error inesperado, intentelo de nuevo más tarde');
              $(".modal-content-msj").addClass('white-text red darken-4');
              $("#modal_mensaje").modal('open');           
          }
      });

    }
   
});

/***** Para agregar una firma *****/
$(document).on('click touch', '#enviarfirmas', function(evento){
  // Capturamnos el boton de envÃ­o
    var btnEnviar = $("#enviarfirmas");

    if ($("#nombre_comentarios").val()=="" || $("#micomentario").val()=="") {
      evento.preventDefault();
      alert("Por favor llena todos los campos antes de enviar tu firma.")
    } else {
        $.ajax({
          type: $("#enviarfirma").attr("method"),
          url:  $("#enviarfirma").attr("action"),
          data: $("#enviarfirma").serialize(),
          beforeSend: function(){
              
              btnEnviar.text("Firmando ..."); // Para input de tipo button
              btnEnviar.attr("disabled","disabled");
          },
          complete:function(data){
              
              btnEnviar.text("Firmado");
              /*btnEnviar.removeAttr("disabled");*/
          },
          success: function(data){
              // console.log(data)
              if(data.status){
                $(".modal-content-msj").html('<p class="mb-0"><i class="fas fa-check-circle mr-2"></i><span>'+data.mensaje+'</span></p>');
                $(".modal-content-msj").addClass('white-text green darken-3');
                $("#modal_mensaje").modal('open');
                
              } else {
                $(".modal-content-msj").html('<i class="material-icons left">cancel</i><span>- Ocurrio un error inesperado, intentelo de nuevo más tarde');
                $(".modal-content-msj").addClass('white-text red darken-4');
                $("#modal_mensaje").modal('open');
              }

              setTimeout(function(){
                  location.reload();
              },4000)
          },
          error: function(data){
              /*
              * Se ejecuta si la peticÃ³n ha sido erronea
              * */
              setTimeout(function()
              {
                // location.reload();
              },2500)

              $(".modal-content-msj").html('<i class="material-icons left">cancel</i><span>Ocurrio un error inesperado, intentelo de nuevo más tarde');
              $(".modal-content-msj").addClass('white-text red darken-4');
              $("#modal_mensaje").modal('open');           
          }
        });
    }
   
});

/***** Para agregar una firma *****/
$(document).on('click touch', '#enviarConfirmacion', function(evento){
  // Capturamnos el boton de envÃ­o
    var btnEnviar = $("#enviarConfirmacion");

    if ($("#adultos").val()=="" || $("#peques").val()=="") {
      evento.preventDefault();
      alert("Por favor llena todos los campos antes de enviar tu confirmación")
    } else {
        $.ajax({
          type: $("#confirmarAsistencia").attr("method"),
          url:  $("#confirmarAsistencia").attr("action"),
          data: $("#confirmarAsistencia").serialize(),
          beforeSend: function(){
              
              btnEnviar.text("Enviando ..."); // Para input de tipo button
              btnEnviar.attr("disabled","disabled");
          },
          complete:function(data){
              
              btnEnviar.text("Confirmado");
              /*btnEnviar.removeAttr("disabled");*/
          },
          success: function(data){
            if(data.response.status){
                $(".modal-content-msj").html('<p class="mb-0"><i class="fas fa-check-circle mr-2"></i><span>'+data.mensaje+'</span></p>');
                $(".modal-content-msj").addClass('white-text green darken-3');
                $("#modal_mensaje").modal('open');
                
              } else {
                $(".modal-content-msj").html('<i class="material-icons left">cancel</i><span>- Ocurrio un error inesperado, intentelo de nuevo más tarde');
                $(".modal-content-msj").addClass('white-text red darken-4');
                $("#modal_mensaje").modal('open');
              }

              setTimeout(function(){
                  location.reload();
              },4000)
          },
          error: function(data){
            /*
              * Se ejecuta si la peticÃ³n ha sido erronea
              * */
              setTimeout(function()
              {
                location.reload();
              },2500)

              $(".modal-content-msj").html('<i class="material-icons left">cancel</i><span>Ocurrio un error inesperado, intentelo de nuevo más tarde');
              $(".modal-content-msj").addClass('white-text red darken-4');
              $("#modal_mensaje").modal('open');           
          }
        });
    }
   
});



$(function(){
	/***** Para el parallax *****/
	$('.parallax').parallax();

	/***** Para el top page *****/
	$('.fixed-action-btn').floatingActionButton();

	/***** Para las imagenes *****/
	$('.materialboxed').materialbox();

	/***** Para los modal *****/
  
	$('.modal').modal();

  $('select').formSelect();

    
  

  

	/***** Para el menu en hamburguer *****/
     $('.sidenav').sidenav({ 
     	edge: 'left'

     });

    /***** Para el slider del dress code  *****/
     $('.carousel ').carousel({
	    fullWidth: false,
	    indicators: false,
	    duration:100,
      numVisible: 1
	    
	  });

	  autoplay();
		function autoplay() 
		{
		    $('.carousel').carousel('next');
		    setTimeout(autoplay, 6000);
		}


      
     $(".linkdata").click(function(evento)
     {
      //Anulamos la funcionalidad por defecto del evento
      evento.preventDefault();
      //Creamos el string del enlace ancla
      var codigo = "#" + $(this).data("enlace");
      //Funcionalidad de scroll lento para el enlace ancla en 3 segundos
      $("html,body").animate({scrollTop: $(codigo).offset().top}, 2000);
    });

     $("#top_body").click(function(evento)
     {
      //Funcionalidad para que vaya arriba lentamente
      $("html,body").animate({scrollTop:0}, "slow");
    });
     $(".li_inicio").click(function(evento)
     {
      //Funcionalidad para que vaya arriba lentamente
      $("html,body").animate({scrollTop:0}, "slow");
    });  
})


function playMusic(){
  document.querySelector('#player').play()
}

function stopMusic(){
  document.querySelector('#player').pause()
}

/*+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-
*                                                                                                                                   
* PARA EL CONTADOR DE LA WEB
*
+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-*/

      //Si existe el elemento contador entonces lo inicializamos (fecha en ingles)
      if( $("#timerCont").length)
        {
          //Obtenemos la fecha del evento
          var countDownDate = new Date("Dec 14, 2024 16:30:00").getTime(); 
          //Actualiza el contador cada segundo
          var x = setInterval(function()  
          {
            //Obtenemos la fecha actual
            var now = new Date().getTime();
            //Obtenemos la diferencia entre la 2 fechas
            var distance = countDownDate - now; 
            //Calculamos el tiempo
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
            //Mostramos el tiempo de manera indivual en los elementos
            document.getElementById("timerCont_dias").innerHTML = "<b>"+days + "</b><br>DÍAS";
            document.getElementById("timerCont_horas").innerHTML = "<b>"+hours + "</b><br>HRS";
            document.getElementById("timerCont_minutos").innerHTML = "<b>"+minutes + "</b><br>MIN";
            document.getElementById("timerCont_segundos").innerHTML = "<b>"+seconds + "</b><br>SEG";
  
            // si ya finalizó el tiempo arrojamos el mensaje
            if (distance < 0) 
            {
              clearInterval(x);
              document.getElementById("timerCont").innerHTML = "¡¡Muchas felicidades!!";
            }
          }, 1000);
        }