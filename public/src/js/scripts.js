/*+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-
*                                                                                                                                   
* PARA LA CARGA DEL LOADING
*
+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-*/

      document.addEventListener("DOMContentLoaded", function()
      {
      	$('.preloader-background').delay(2000).fadeOut('slow');
      });


/*+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-
*                                                                                                                                   
* PARA LA MUSICA DE FONDO
*
+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-*/

      //Obtenemos elemento de la musica
      let audio = document.getElementById("background_music"); 

      //Funciones que se activan con un evento para pausar y reproducir la musica 
      function playAudio() 
      { 
        audio.play(); 
      } 
      function pauseAudio() 
      { 
        audio.pause(); 
      } 

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
      
      //Al presionar el icono de pausar se pausa la musica
      $(document).on('click touch', '.pausarAudio', function(evento)
      {
          pauseAudio();
      });

      //Al reproducir el icono de resproducir se reproduce la musica
      $(document).on('click touch', '.playAudio', function(evento)
      {
          playAudio();
      });

/*+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-
*                                                                                                                                   
* PROPIEDADES PARA LA ANIMACIÓN DE LOS ELEMENTOS DE LA PAGINA CON AOS
*
+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-*/

      //Inicializamos todas las animaciones en la web
      AOS.init({offset:3,});


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

/*+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-
*                                                                                                                                   
* SI HAY INVITACION EN ESTILO MULTIMEDIA PARA MOSTRAR EN MODAL
*
+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-*/

      //Para abrir la invitación arrojamos un overlay
      function on_invitacion() 
      {
          //Aparecemos el background overlay
          document.getElementById("overlay").style.display = "block";
      }
      //Para cerrar la invitación la pausamos y quitamos el overlay
      function off_invitacion() 
      {
          document.getElementById("overlay").style.display = "none";
          document.getElementById("video_invitacion").pause();
      }

      //Si presionamos el boton de cerrar video ejecutamos funcion de cerrar invitacion
      $(document).on('click touch', '#text_invitacion', function(evento)
      {
          off_invitacion();
      });

/*+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-
*                                                                                                                                   
* EN CASO DE QUE EN LA GALERÍA HAYA MÁS DE 20 FOTOS
*
+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-*/

      //Agregamos boton y elemento para mostrar mas y ocultar el resto de las fotos
      $(document).on('click touch', '.vermasfotos', function(evento)
      {
          evento.preventDefault();
          if($(this).text() === "Ver más fotos")
          {
            $(".morephotos").show();
            $(this).text("Ver menos fotos");
          }
          else
          {
            $(".morephotos").hide();
            $(this).text("Ver más fotos");
          }
      });


/*+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-
*                                                                                                                                   
* FUNCIONES DEL DOM
*
+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-*/

      $(function()
      {
          //movil y tablet cambiar foto de portada en caso de haber dif
          // if($(window).width() <= 768)
          // {
          //   $(".imgportada").attr("src","src/images/save_the_date/portadamonitor.jpg");
          // } else {
          //   $(".imgportada").attr("src","src/images/fondos/Jessi+Luis_STD+(56).jpg");
          // }


          $('.fixed-action-btn').floatingActionButton(); // Para el top page
          $('.parallax').parallax(); //Para el parallax
          $('.materialboxed').materialbox(); //Para las imagenes abrirlas dentro de la misma página
          $('.modal').modal(); // Para los modal
          $('.sidenav').sidenav({ //Para el menu sidenav hamburguer
            edge: 'left'
          });
          $('select').formSelect(); //Para los inputs selects
          $('#menu_galeria').tabs(); //En caso de haber galería save the dat en tabs

          $('.carousel-dress-code ').carousel({ //Para el slider del dress code
            fullWidth: false,
            indicators: false,
            duration:100,
            numVisible: 1
          });
        
          $('.carousel-libro-firmas').carousel({ //Para el carousel del libro de firmas
            fullWidth: false,
            indicators: false,
            duration:1000,
            numVisible: 1
          });

          //Inicializamos en automatico el carousel del dress code
          if($(".carousel-dress-code").length)
          {
              autoplay();
              function autoplay() 
              {
                  $('.carousel-dress-code').carousel('next');
                  setTimeout(autoplay, 6000);
              }
          }

          //Inicializamos en automatico el carousel del libro de firmas
          if($(".carousel-libro-firmas").length)
          {
              autoplay2();
              function autoplay2()
              {
                $('.carousel-libro-firmas').carousel('next');
                  setTimeout(autoplay2, 10000);
              }
          }
          
          //Al presionar sobre el menú que te mande a la sección
          $(".linkdata").click(function(evento) 
          {    
              evento.preventDefault(); //Anulamos la funcionalidad por defecto del evento
              var codigo = "#" + $(this).data("enlace");//Creamos el string del enlace ancla
              $("html,body").animate({scrollTop: $(codigo).offset().top}, 2000); //Funcionalidad de scroll lento para el enlace ancla en 3 segundos
          });
          //Al presionar sobre la opción de inicio del menu
          $(".li_inicio").click(function(evento) 
          {
            $("html,body").animate({scrollTop:0}, "slow"); //Funcionalidad para que vaya arriba lentamente
          });
          //CUANDO SE PRESIONA EL BOTÓN TOP PARA IR AL INICIO DE LA PÁGINA
          $("#top_body").click(function(evento) 
          {
              $("html,body").animate({scrollTop:0}, "slow"); //Funcionalidad para que vaya arriba lentamente
          });

          
      });

/*+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-
*                                                                                                                                   
* FUNCIONES PARA EL LIBRO DE FIRMAS
*
+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-*/

      $(document).on('click touch', '#enviarfirmas', function(evento)
      {
          var btnEnviar = $("#enviarfirmas"); //Capturamnos el boton de envío

          if ( $("#nombre_comentarios").val().trim() == '' || $("#micomentario").val().trim() == '') //Validamos que no se encuentre vacío
          {
            evento.preventDefault();
            alert("Por favor llena todos los campos antes de enviar tu firma.")
          }
          else
          {
              $.ajax({
                type: $("#enviarfirma").attr("method"),
                url:  $("#enviarfirma").attr("action"),
                data: $("#enviarfirma").serialize(),
                beforeSend: function()
                {
                    btnEnviar.text("Firmando ..."); // Para input de tipo button
                    btnEnviar.attr("disabled","disabled"); // Deshabilitamos el boton de enviar
                },
                complete:function(data)
                {
                    btnEnviar.text("Firmado");
                    /*btnEnviar.removeAttr("disabled");*/
                },
                success: function(data)
                {
                    if(data.indexOf('Error') > -1)
                    {
                        let timerInterval
                        Swal.fire({
                            title: 'Error',
                            text: data,
                            icon: 'error',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: () => 
                            {
                                Swal.showLoading()
                            },
                            willClose: () => 
                            {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            if (result.isConfirmed) 
                            {
                                window.location.reload(true);
                            }
                        })
                    
                    }
                    else
                    {
                         let timerInterval
                          Swal.fire({
                              title: '¡Exitoso!',
                              text: data,
                              icon: 'success',
                              allowOutsideClick: false,
                              allowEscapeKey: false,
                              timer: 3000,
                              timerProgressBar: true,
                              didOpen: () => 
                              {
                                  Swal.showLoading()
                              },
                              willClose: () => 
                              {
                                  clearInterval(timerInterval)
                              }
                          }).then((result) => {
                              /* Read more about handling dismissals below */
                              if (result.dismiss === Swal.DismissReason.timer) 
                              {
                                  location.reload();
                              }
                          })
                    }
                },
                error: function(data)
                {
                      Swal.fire({
                        title: 'Error',
                        text: "Se ha interrumpido la conexión con el servidor, intentalo de nuevo más tarde",
                        icon: 'error',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        customClass: {
                            confirmButton: 'btn-confirm',
                            container: "modal-error-conexion-servidor",
                        },
                        confirmButtonText: '¡Entendido!',
                    }).then((result) => {
                        if (result.isConfirmed) 
                        {
                            window.location.reload(true);
                        }
                    })
                }
            });
          }
      });

/*+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-
*                                                                                                                                   
* FUNCIONES PARA LA CONFIRMACIÓN DE ASISTENCIA
*
+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-*/

    //Para el si asistire
    $(document).on('click touch', '#asis-option', function(evento)
    {
        const radioButtons2 = document.querySelectorAll('input[name="selectorc"]');
        const pases = document.querySelector('#nuPases'); // contiene el numero de pases
        const restriccion_alimento = document.querySelector('#restriccion_alimento'); //restriccion alimentos
        const alergias = document.querySelector('#alergias'); //alergias
        const cancion = document.querySelector('#cancion'); //cancion
        const alcohol = document.querySelector('#alcohol'); //alcohol
        
        let selectedSize2; //Para guardar Valor del radibutton de asistencia
        
        for (const radioButton of radioButtons2) //Recorremos el radibutton
        {
            if (radioButton.checked) //Revisamos si esta checado
            {
                selectedSize2 = radioButton.value; //Asignamos el valor
                break; //Al asignar salimos
            } 
        }
      
      if(selectedSize2 == 'Si asistire') //Si es asistencia desocultamos los inputs
      {
        pases.removeAttribute('hidden');
        restriccion_alimento.removeAttribute('hidden');
        alergias.removeAttribute('hidden');
        cancion.removeAttribute('hidden');
        alcohol.removeAttribute('hidden');
      }       


    });

    //Para el no asistire
    $(document).on('click touch', '#nasis-option', function(evento)
    {
      const radioButtons2 = document.querySelectorAll('input[name="selectorc"]');       
      const pases = document.querySelector('#nuPases'); // contiene el numero de pases
     
      const restriccion_alimento = document.querySelector('#restriccion_alimento'); // contiene el numero de pases_niños
      const alergias = document.querySelector('#alergias'); //alergias
      const cancion = document.querySelector('#cancion'); //cancion
      const alcohol = document.querySelector('#alcohol'); //alcohol
       

        let selectedSize2; //Para guardar Valor del radibutton de asistencia
        
        for (const radioButton of radioButtons2) //Recorremos el radibutton
        {
            if (radioButton.checked) //Revisamos si esta checado
            {
                selectedSize2 = radioButton.value; //Asignamos el valor
                break; //Al asignar salimos
            } 
        }
        
        if(selectedSize2 == 'No asistire')
        {
          pases.setAttribute('hidden', true);
          restriccion_alimento.setAttribute('hidden', true);
          alergias.setAttribute('hidden', true);
          cancion.setAttribute('hidden', true);
          alcohol.setAttribute('hidden', true);

          $("#restriccion_alimento_txt").val("NA");
          $("#alergias_txt").val("NA");
          $("#cancion_txt").val("NA");
          $("#alcohol_txt").val("NA");
          
        }  
            
    });

    //Para cuando se envia el cuestionario de confirmacion de asistencia
      $(document).on('click touch', '#enviarcuestionario', function(evento)
      {        
        let btnEnviar = $("#enviarcuestionario"); // Capturamnos el boton de envío
        const radioButtons2 = document.querySelectorAll('input[name="selectorc"]'); //Contiene el selector de asistencia
        let selectedSize1; //Guarda el valor de asistencia
        
        for (const radioButton of radioButtons2) //Recorremos el radibutton de asistencia
        {
            if (radioButton.checked) //Revisamos si esta checado
            {
                selectedSize1 = radioButton.value; //Asignamos el valor
                break; //Al asignar salimos
            } 
        }
        
        if(selectedSize1 == 'Si asistire')
        {
          //Validamos que no se encuentren vacíos los valores de los inputs en especial y de los selects
          if ($("#restriccion_alimento_txt").val() == "" || $("#alergias_txt").val() == "" || $("#cancion_txt").val() == "" || $("#alcohol_txt").val() == "" || !$('input[name="selectorc"]').is(':checked')) 
          {
            evento.preventDefault();
              Swal.fire({
                title: 'Error',
                text: "Por favor llena todos los campos solicitados.",
                icon: 'error',
                allowOutsideClick: false,
                allowEscapeKey: false,
                customClass: {
                    confirmButton: 'btn-confirm',
                    container: "modal-error-conexion-servidor",
                },
                confirmButtonText: '¡Entendido!',
            }).then((result) => {
                if (result.isConfirmed) 
                {
                    //window.location.reload(true);
                }
            })
            return false
          }
          else
          {
              $.ajax({
                type: $("#enviaremaill").attr("method"),
                url:  $("#enviaremaill").attr("action"),
                data: $("#enviaremaill").serialize(),
                beforeSend: function()
                {
                    btnEnviar.text("Enviando ..."); // Para input de tipo button
                    btnEnviar.attr("disabled","disabled"); //Deshabilitamos el boton 
                },
                complete:function(data)
                {
                    btnEnviar.text("Enviado");
                    /*btnEnviar.removeAttr("disabled");*/
                },
                success: function(data)
                {
                  if(data.indexOf('Error') > -1)
                  {
                      let timerInterval
                      Swal.fire({
                          title: 'Error',
                          text: data,
                          icon: 'error',
                          allowOutsideClick: false,
                          allowEscapeKey: false,
                          timer: 3000,
                          timerProgressBar: true,
                          didOpen: () => 
                          {
                              Swal.showLoading()
                          },
                          willClose: () => 
                          {
                              clearInterval(timerInterval)
                          }
                      }).then((result) => {
                          if (result.isConfirmed) 
                          {
                              window.location.reload(true);
                          }
                      })
                  
                  }
                  else
                  {
                        let timerInterval
                        Swal.fire({
                            title: '¡Exitoso!',
                            text: data,
                            icon: 'success',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: () => 
                            {
                                Swal.showLoading()
                            },
                            willClose: () => 
                            {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) 
                            {
                                location.reload();
                            }
                        })
                  }
                },
                error: function(data)
                {
                    Swal.fire({
                        title: 'Error',
                        text: "Se ha interrumpido la conexión con el servidor, intentalo de nuevo más tarde",
                        icon: 'error',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        customClass: {
                            confirmButton: 'btn-confirm',
                            container: "modal-error-conexion-servidor",
                        },
                        confirmButtonText: '¡Entendido!',
                    }).then((result) => {
                        if (result.isConfirmed) 
                        {
                            window.location.reload(true);
                        }
                    })
                }
            });
          }
        }
        //Si coloca que no asistira
        else
        {
          //Validamos que no se encuentren vacíos los valores de los inputs en especial y de los selects
          if (!$('input[name="selectorc"]').is(':checked')) 
          {
            evento.preventDefault();
              Swal.fire({
                title: 'Error',
                text: "Por favor llena todos los campos solicitados.",
                icon: 'error',
                allowOutsideClick: false,
                allowEscapeKey: false,
                customClass: {
                    confirmButton: 'btn-confirm',
                    container: "modal-error-conexion-servidor",
                },
                confirmButtonText: '¡Entendido!',
            }).then((result) => {
                if (result.isConfirmed) 
                {
                    //window.location.reload(true);
                }
            })
            return false
          }
          else
          {
              $.ajax({
                type: $("#enviaremaill").attr("method"),
                url:  $("#enviaremaill").attr("action"),
                data: $("#enviaremaill").serialize(),
                beforeSend: function()
                {
                    btnEnviar.text("Enviando ..."); // Para input de tipo button
                    btnEnviar.attr("disabled","disabled"); //Deshabilitamos el boton 
                },
                complete:function(data)
                {
                    btnEnviar.text("Enviado");
                    /*btnEnviar.removeAttr("disabled");*/
                },
                success: function(data)
                {
                    if(data.indexOf('Error') > -1)
                    {
                        let timerInterval
                        Swal.fire({
                            title: 'Error',
                            text: data,
                            icon: 'error',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: () => 
                            {
                                Swal.showLoading()
                            },
                            willClose: () => 
                            {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            if (result.isConfirmed) 
                            {
                                window.location.reload(true);
                            }
                        })
                    
                    }
                    else
                    {
                          let timerInterval
                          Swal.fire({
                              title: '¡Exitoso!',
                              text: data,
                              icon: 'success',
                              allowOutsideClick: false,
                              allowEscapeKey: false,
                              timer: 3000,
                              timerProgressBar: true,
                              didOpen: () => 
                              {
                                  Swal.showLoading()
                              },
                              willClose: () => 
                              {
                                  clearInterval(timerInterval)
                              }
                          }).then((result) => {
                              /* Read more about handling dismissals below */
                              if (result.dismiss === Swal.DismissReason.timer) 
                              {
                                  location.reload();
                              }
                          })
                    }
                },
                error: function(data)
                {
                      Swal.fire({
                        title: 'Error',
                        text: "Se ha interrumpido la conexión con el servidor, intentalo de nuevo más tarde",
                        icon: 'error',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        customClass: {
                            confirmButton: 'btn-confirm',
                            container: "modal-error-conexion-servidor",
                        },
                        confirmButtonText: '¡Entendido!',
                    }).then((result) => {
                        if (result.isConfirmed) 
                        {
                            window.location.reload(true);
                        }
                    })
                }
            });
          }
        }
      });

      


