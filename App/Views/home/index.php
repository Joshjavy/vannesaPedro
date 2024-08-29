<?php
if (!isset($_GET['invitado'])) {
	echo '<meta http-equiv="refresh" content="0; url=' . $baseUrl . 'Home/login">';
	return false;
}

?>
<!-- CSS: Importar css personalizado -->
<link rel="stylesheet" href="<?= $baseUrl ?>src/css/jquery.bxslider.css">
<!--Importar materialize.css-->
<link type="text/css" rel="stylesheet" href="<?= $baseUrl ?>src/css/materialize.min.css">
<script src="https://cdn.tailwindcss.com"></script>

<body class="position-relative sm:text-2xl	 text-2xl	 md:text-2xl		 lg:text-lg 2xl:text-3xl 2xl:text-3xl" style="background-color: #162335;">
	<!---- Modal msj ---->
	<div id="modal_mensaje" class="modal">
		<div class="modal-content modal-content-msj"></div>
	</div>

	<!---- mapa ceremonia  ---->
	<div id="modal_ceremonia" class="modal">
		<div class="modal-content">
			<p class="pb-10 sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-3xl 2xl:text-3xl beige font-Georgia">
				Villa Cortés
				<br />

			</p>

			<iframe
				class="maps mb-3"
				src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15098.292654909048!2d-99.1956948!3d18.9060078!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cddf7a16fa3261%3A0xdfb93619b127596d!2sJard%C3%ADn%20de%20Eventos%20Villa%20Cort%C3%A9s!5e0!3m2!1ses!2smx!4v1724906836712!5m2!1ses!2smx"
				frameborder="0"
				style="border:0;"
				allowfullscreen=""
				loading="lazy"
				aria-hidden="false"
				tabindex="0"></iframe>

			<!-- <p class="text-left text-secondary text-base py-3">
				<span class="font-bold">Dirección:</span> Camino Tetecalita a la Quebradora, s/n Tetecalita, 62767 Emiliano Zapata, Mor.
			</p> -->
			<p class="text-left text-secondary text-base">
				<span class="font-bold">Fecha y hora ceremonia:</span> 14 de Diciembre de 2024 a las 16:30 hrs.
			</p>
		</div>

		<div class="modal-footer">
			<a href="#!" class="modal-close block w-auto waves-effect waves-dark btn-small bg-buttons modal-trigger bg-third text-white" style="background-color: #162335!important;">Cerrar</a>
		</div>
	</div>

	<!---- mapa recepcion  ---->

	<div id="modal_recepcion" class="modal">
		<div class="modal-content">
			<p class="pb-10 sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-3xl 2xl:text-3xl beige font-Georgia">
				Jardín La Vila<br />
			</p>
			<iframe
				class="maps mb-3"
				src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15099.951506808145!2d-99.18841!3d18.887619!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cddf514c5fc915%3A0x12356c08ba318fe8!2sLa%20Vila%20Jardin!5e0!3m2!1ses!2smx!4v1724124408994!5m2!1ses!2smx"
				frameborder="0"
				style="border:0;"
				allowfullscreen=""
				loading="lazy"
				aria-hidden="false"
				tabindex="0"></iframe>


			<p class="text-left text-secondary text-base">
				<span class="font-bold">Fecha y hora recepción:</span> 27 de Septiembre de 2024 a las 4:30 PM.
			</p>
		</div>

		<div class="modal-footer">
			<a href="#!" class="modal-close block w-auto waves-effect waves-dark btn-small bg-buttons modal-trigger bg-third text-white" style="background-color: #162335!important;">Cerrar</a>
		</div>
	</div>
	<!--!-->
	<div id="overlay">
		<div id="text" onclick="off()">
			<i class="fas fa-times"></i>
		</div>
		<div id="video" class="center-align">
			<img class="img-invitacion" src="<?= $baseUrl ?>src/img/invitacion.png" alt="invitación">
		</div>
	</div>

	<!--Precarga Loading-->
	<div class="preloader-background">
		<div class="lds-heart">
			<div></div>
		</div>
	</div>

	<!-- Top button -->
	<div class="fixed-action-btn">
		<a class="btn-floating btn-large" style="background-color:#162335;" id="top_body">
			<i class="fas fa-chevron-up"></i>
		</a>
	</div>

	<div class="fixed-action-btn" style="margin-bottom: 5rem;">
		<a class="btn-floating btn-large" style="background-color:#162335;">
			<i class="fas fa-music"></i>
		</a>
		<ul>
			<li><a class="btn-floating" style="background-color:#162335;" onclick="playMusic()"><i class="fas fa-volume-up"></i></a></li>
			<li><a class="btn-floating darken-1" style="background-color:#162335;" onclick="stopMusic()"><i class="fas fa-volume-mute"></i></a></li>
		</ul>
		<audio id="player" class="d-none" preload="auto" autoplay loop>
			<source src="<?= $baseUrl ?>src/audio/song.mp3" type="audio/mp3">
		</audio>
	</div>

	<!-- SIDEBAR -->
	<ul class="sidenav sidenav-close" id="mobile-demo">
		<li class="li_inicio"><a href="#">INICIO</a></li>
		<li class="li_cont uppercase"><a href="#" class="linkdata" data-enlace="Mis_Padres">Papás de la novia</a></li>
		<li class="li_cont uppercase"><a href="#" class="linkdata" data-enlace="Mis_Padres">Papás del novio</a></li>
		<li class="li_cont uppercase"><a href="#" class="linkdata" data-enlace="Padrinos">Padrinos</a></li>
		<li class="li_cont uppercase"><a href="#" class="linkdata" data-enlace="Ceremonia">Ceremonia</a></li>
		<li class="li_cont uppercase"><a href="#" class="linkdata" data-enlace="Cronograma">Cronograma</a></li>
		<li class="li_cont uppercase"><a href="#" class="linkdata" data-enlace="galeria">GALERÍA</a></li>
		<li class="li_cont uppercase"><a href="#" class="linkdata" data-enlace="Codigo_de_Vestimenta">Código de Vestimenta</a></li>
		<li class="li_cont uppercase"><a href="#" class="linkdata" data-enlace="Mesa_de_regalos">Mesa de regalos</a></li>
		<li class="li_cont uppercase"><a href="#" class="linkdata" data-enlace="LIBRODEFIRMAS">LIBRO DE FIRMAS</a></li>
		<li class="li_cont uppercase"><a href="#" class="linkdata" data-enlace="ASISTENCIA">ASISTENCIA</a></li>
	</ul>

	<a href="#" id="iconHamburguer" data-target="mobile-demo" class="sidenav-trigger hide-on-large-only">
		<i class="fas fa-bars" style="background-color:#162335"></i>
	</a>

	<a href="#" id="iconArrow" data-target="mobile-demo" class="sidenav-trigger hide-on-med-and-down btn-floating pulse" style="background-color:#162335">
		<i class="fas fa-chevron-circle-right"></i>
	</a>

	<!-- MAIN-->
	<div class="bg-main min-vh-100">
		<div class="container-fluid" data-aos="zoom-out-up" data-aos-duration="2500">
			<div class="row justify-content-end align-items-center">
				<div class="col col-sm-12 col-md-12 col-lg-4">


				</div>
			</div>
		</div>
	</div>

	<!-- POST IT -->
	<div class="py-10 bg-one" id="Mis_Padres">
		<div class="container-fluid h-fit py-20">
			<div class="row justify-content-center">
				<div class="col-md-5 d-flex flex-column align-items-center sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-3xl 2xl:text-3xl px-5 text-center" data-aos="fade-up" data-aos-duration="1500">
					<p class="mt-28  sm:mt-5 md:mt-5  lg:mt-10 2xl:mt-10">
						HOY SELLAMOS NUESTRO AMOR CON UN COMPROMISO ETERNO.<br />¡NOS CASAMOS!
					</p>
					<p>
						<!-- <img src="<?= $baseUrl ?>src/img/puntos/Punto_8/a.png" class=" w-11/12	 sm:w-11/12	 md:w-3/4	 lg:w-2/3 xl:w-2/3 2xl:w-2/3	 m-auto"> -->

					</p>
					<h1 class="text-3xl	 sm:text-3xl md:text-3xl lg:text-3xl 2xl:text-6xl 2xl:text-6xl pt-10">
						Papás de la novia
					</h1>

					<p class="pt-10 text-center flex justify-center mt-10">
						MA DOLORES ZAMUDIO NAJERA<br />
						y<br />
						HÉCTOR ACEVES BAHENA
					</p>


				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-md-5 d-flex flex-column align-items-center sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-3xl 2xl:text-3xl px-5 text-center" data-aos="fade-up" data-aos-duration="1500">
					<h1 class="text-3xl	 sm:text-3xl md:text-3xl	 lg:text-3xl 2xl:text-6xl 2xl:text-6xl pt-10">
						Papás del novio
					</h1>

					<p class="pt-10 text-center flex justify-center mt-10">
						ANGELICA MARÍA ORTIZ JUAREZ<br />
						y<br />
						PEDRO GERMÁN SÁNCHEZ MIRANDA
					</p>


				</div>
			</div>


			<div class="row justify-content-center" id="Padrinos">
				<div class="col-md-5 d-flex flex-column align-items-center sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-3xl 2xl:text-3xl px-5 text-center" data-aos="fade-up" data-aos-duration="1500">
					<h1 class="text-3xl	 sm:text-3xl md:text-3xl	 lg:text-3xl 2xl:text-6xl 2xl:text-6xl pt-10">
						Padrinos
					</h1>

					<p class="pt-10 text-center flex justify-center mt-10">
						ANTONIO ZAMUDIO BARRERA<br />
						y<br />
						RMA GRISELDA BARRERA ÁVILA
					</p>


				</div>

			</div>

			<div class="flex justify-center">
				<img src="<?= $baseUrl ?>src/img/elementos/elemento_stephy.png" class="mt-5" data-aos="fade-up" data-aos-duration="1500" />
			</div>

		</div>

	</div>

	<!-- PARALLAX 1 -->
	<div class="parallax-container center valign-wrapper z-depth-4 divparallaxConteiner">
		<div class="parallax parallaxlast2 " style="height: 100% !important; width: 100% !important;">
			<!-- <img src="<?= $baseUrl ?>src/img/puntos/Punto_8/d.jpg" class="imgsmovil" loading="lazy" style="width:40px !important;"> -->
			<img src="<?= $baseUrl ?>src/img/puntos/Punto_8/d.jpg" class="imgsmovil" loading="lazy">
		</div>
		<div class="container white-text">
			<div class="row">
				<div class="col s12">




				</div>
			</div>
		</div>
	</div>
	<!-- CONTADOR -->
	<div data-aos="fade-up" data-aos-duration="1500">
		<div class="contendor" style="height: 150px; background-color: #162335;  ">
			<div class="container py-10">
				<div class="flext justify-center">
					<div class=" flext justify-center justify-contents-center ">
						<div class="row inline-block align-middle" id="timerCont">
							<div class="col s12 hide-on-med-and-up"></div>
							<div class="col s3 m3 l3 ">
								<span class="texto-imagenes text-3xl " id="timerCont_dias"></span>
							</div>
							<div class="col s3 m3 l3">
								<span class="texto-imagenes text-3xl" id="timerCont_horas"></span>
							</div>
							<div class="col s3 m3 l3">
								<span class="texto-imagenes text-3xl" id="timerCont_minutos"></span>
							</div>
							<div class="col s3 m3 l3">
								<span class="texto-imagenes text-3xl" id="timerCont_segundos"></span>
							</div>
							<div class="col s12 hide-on-med-and-up"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- CONTADOR -->
	<!-- EL GRAN DÍA -->
	<div class="d-flex flex-column align-items-center py-24 bg-two px-3" id="Ceremonia">
		<!-- <p class="text-center flex justify-center text-3xl	 sm:text-3xl md:text-3xl	 lg:text-3xl 2xl:text-6xl 2xl:text-6xl  mt-20 sm:mt-10 md:mt-10 lg:mt-20 2xl:mt-20 2xl:mt-20 fonttitle beige"
			style="height:75px; padding-top:10px; "
			data-aos="fade-up" data-aos-duration="1500">
			Detalles
		</p> -->

		<img src="<?= $baseUrl ?>src/img/elementos/iglesia_dorada.png" class="w-32  mb-10 mt-10	" data-aos="fade-up" data-aos-duration="1500" />
		<p class="text-center flex justify-center text-3xl	 sm:text-3xl md:text-3xl	 lg:text-3xl 2xl:text-6xl 2xl:text-6xl fonttitle beige"
			style="height:75px; padding-top:10px; "
			data-aos="fade-up" data-aos-duration="1500">
			<!-- 2 columnas para aliminar Ceremonia y hr!-->
			Ceremonia
		</p>
		<p class="text-center flex justify-center text-3xl	 sm:text-3xl md:text-3xl	 lg:text-3xl 2xl:text-6xl 2xl:text-6xl  beige sm:mt-10 md:mt-10 lg:mt-20 2xl:mt-20 2xl:mt-20" data-aos="fade-up" data-aos-duration="1500">
			<span class="font-Georgia"> 16:30 hrs</span>

		</p>

		<p class="text-center mt-10 sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-3xl 2xl:text-3xl px-5 text-center" data-aos="fade-up" data-aos-duration="1500">
			Villa Cortés<br />
			C. Francisco Villa 252, Las Granjas, 62460 Cuernavaca, Mor.<br />
			<!--Link mapa pendiente!-->

		</p>
		<div class="flex justufy-center">
			<span>
				<a
					data-aos="fade-up"
					data-aos-duration="1500"
					href="#modal_ceremonia"
					class="block w-fit waves-effect waves-dark btn-small  modal-trigger bg-rosa20 text-white mt-5" style="background-color: #162335!important;">Ver mapa</a>
			</span>

		</div>
		<img src="<?= $baseUrl ?>src/img/elementos/elemento_stephy.png" class="mt-5" data-aos="fade-up" data-aos-duration="1500" />
		<!--recepcion!-->
		<!-- <div data-aos="fade-up" data-aos-duration="1500">
			
			<p class="text-center flex justify-center text-3xl	 sm:text-3xl md:text-3xl	 lg:text-3xl 2xl:text-6xl 2xl:text-6xl fonttitle beige mt-10 sm:mt-10 md:mt-10 lg:mt-20 2xl:mt-20 2xl:mt-20" data-aos="fade-up" data-aos-duration="1500"
				style="height:75px; padding-top:10px; ">
				Recepción
			</p>
			<p class="text-center flex justify-center text-3xl	 sm:text-3xl md:text-3xl lg:text-3xl 2xl:text-6xl 2xl:text-6xl  beige
			sm:mt-10 md:mt-10 lg:mt-20 2xl:mt-20 2xl:mt-20
			" data-aos="fade-up" data-aos-duration="1500">
				<span class="font-Georgia"> 4:30 pm</span>

			</p>


			<p class="text-center  mt-10 pb-10 sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-3xl 2xl:text-3xl px-5 text-center" data-aos="fade-up" data-aos-duration="1500">
				Jardín La Vila<br />
				Av. Emiliano Zapata 108, Col. José G. Parres, 62564 Jiutepec, Mor.<br />
				

			</p>
			<p class="text-center flex justify-center">
				<a
					data-aos="fade-up"
					data-aos-duration="1500"
					href="#modal_recepcion"
					class="block w-fit waves-effect waves-dark btn-small bg-buttons modal-trigger bg-rosa20 text-white mt-5" style="background-color: #162335!important;">Ver mapa</a>

			</p>
		</div> -->
	</div>

	<!-- PARALLAX 2 -->
	<div class="parallax-container center valign-wrapper z-depth-4 divparallaxConteiner">
		<div class="parallax parallaxlast_2" style="height: 100% !important; width: 100% !important;">
			<img src="<?= $baseUrl ?>src/img/save-the-date/IMG_7348.jpg" class="imgsmovil" loading="lazy">
		</div>
		<div class="container white-text">
			<div class="row">
				<div class="col s12">
					<h2 class="text-white text-shadow"></h2>
				</div>
			</div>
		</div>
	</div>

	<!-- MESA DE REGALOS -->
	<div style="background-color: #FFF;" class="py-10">
		<div class="row justify-content-center pb-10" data-aos="fade-up" data-aos-duration="1500">
			<p class="text-center flex justify-center text-3xl	 sm:text-3xl md:text-3xl	 lg:text-3xl 2xl:text-6xl 2xl:text-6xl fonttitle beige mt-10 sm:mt-10 md:mt-10 lg:mt-20 2xl:mt-20 2xl:mt-20" style="height:75px; padding-top:10px; " id="Cronograma">
				Cronograma
			</p>

		</div>

		<div class="sm:w-full md:w-full lg:w-1/2 2xl:w-1/2 2xl:w-1/2 m-auto px-5" data-aos="fade-up" data-aos-duration="1500">
			<!-- <img src="<?= $baseUrl ?>src/img/elementos/Cronograma_XV_stephy.png" class=" sm:w-full md:w-full lg:w-3/4 2xl:w-3/4 2xl:w-3/4 		 m-auto" loading="lazy"> -->
			<img src="<?= $baseUrl ?>src/img/puntos/Punto_10/Cronograma.png" class=" sm:w-full md:w-full lg:w-3/4 2xl:w-3/4 2xl:w-3/4 		 m-auto" loading="lazy">
		</div>
		<div class="flex justify-center">
			<img src="<?= $baseUrl ?>src/img/elementos/elemento_stephy.png" />
		</div>
		<div class="sm:w-full md:w-full lg:w-1/2 xl:w-1/2 2xl:w-1/2 m-auto px-5 pt-10" data-aos="fade-up" data-aos-duration="1500">
			<!--Slider!-->
			<div class="mx-auto h-fit" style=" border:solid 1px #FFF; background-color: #fff; -webkit-border-radius: 3px!important;  -moz-border-radius: 3px!important;  border-radius: 3px!important; margin-top:50px; margin-bottom: 50px;">

				<div class="galeria" style="box-shadow:none!important ;border:none!important; ">
					<div class="slide"><img src="<?= $baseUrl ?>src/img/galeria/Sesion_Stephy_2.jpg"></div>
					<div class="slide"><img src="<?= $baseUrl ?>src/img/galeria/Sesion_Stephy_3.jpg"></div>
					<div class="slide"><img src="<?= $baseUrl ?>src/img/galeria/Sesion_Stephy_21.jpg"></div>
					<div class="slide"><img src="<?= $baseUrl ?>src/img/galeria/Sesion_Stephy_26.jpg"></div>
					<div class="slide"><img src="<?= $baseUrl ?>src/img/galeria/Sesion_Stephy_51.jpg"></div>
					<div class="slide"><img src="<?= $baseUrl ?>src/img/galeria/Sesion_Stephy_77.jpg"></div>
					<div class="slide"><img src="<?= $baseUrl ?>src/img/galeria/Sesion_Stephy_84.jpg"></div>
					<div class="slide"><img src="<?= $baseUrl ?>src/img/galeria/Sesion_Stephy_118.jpg"></div>
					<div class="slide"><img src="<?= $baseUrl ?>src/img/galeria/Sesion_Stephy_135.jpg"></div>
					<div class="slide"><img src="<?= $baseUrl ?>src/img/galeria/Sesion_Stephy_149.jpg"></div>
					<div class="slide"><img src="<?= $baseUrl ?>src/img/galeria/Sesion_Stephy_165.jpg"></div>
					<div class="slide"><img src="<?= $baseUrl ?>src/img/galeria/Sesion_Stephy_184.jpg"></div>
					<div class="slide"><img src="<?= $baseUrl ?>src/img/galeria/Sesion_Stephy+PORTADA-01.jpg"></div>
					<div class="slide"><img src="<?= $baseUrl ?>src/img/galeria/Sesion_Stephy+PORTADA-02.jpg"></div>
					<div class="slide"><img src="<?= $baseUrl ?>src/img/galeria/STD_P_V_101.jpg"></div>

				</div>


			</div>
			<!--Slider!-->
		</div>
	</div>

	<!-- PARALLAX 3 -->
	<!-- <div class="parallax-container center valign-wrapper z-depth-4 divparallaxConteiner">
		<div class="parallax parallaxlast3" style="height: 100% !important; width: 100% !important;">
			<img src="<?= $baseUrl ?>src/img/save-the-date/IMG_7760.jpg" class="imgsmovil" loading="lazy">
		</div>
		<div class="container white-text">
			<div class="row">
				<div class="col s12">
					<h2 class="text-white text-shadow"></h2>
				</div>
			</div>
		</div>
	</div> -->

	<!-- HOSPEDAJE -->

	<div class="d-flex flex-column pt-10" id="galeria" style="background-color: #162335; ">
		<!--Galeria!-->
		<!-- <div >
			<div class="container ">
				<div class="w-full sm:w-full md:w-full  lg:w-9/12 xl:w-9/12 2xl:w-9/12 	 m-auto">
					<img src="<?= $baseUrl ?>src/img/puntos/Punto_8/b.png" >
				</div>
			</div>

		</div> -->


		<!--Fin galeria!-->
		<div class="container" id="Codigo_de_Vestimenta">

			<div class="row justify-content-center align-items-center">
				<div class="col-12 col-md-10 d-flex flex-column align-items-center py-10">
					<p class="text-center flex justify-center text-3xl	 sm:text-3xl md:text-3xl	 lg:text-3xl xl:text-6xl 2xl:text-6xl fonttitle beige py-10">
						Código de Vestimenta
					</p>
					<p class="text-center  mt-3 text-3xl text-white">

						<!--Link mapa pendiente!-->
					</p>
					<img src="<?= $baseUrl ?>src/img/vestimenta/H_10.png" class="w-full sm:w-full md:w-1/2	 lg:w-1/2 xl:w-1/2 2xl:w-1/2  mt-20">
					<img src="<?= $baseUrl ?>src/img/vestimenta/H_11.png" class="w-full sm:w-full md:w-1/2	 lg:w-1/2 xl:w-1/2 2xl:w-1/2">
					<img src="<?= $baseUrl ?>src/img/vestimenta/Mujeres_15-01.jpg" class="w-full sm:w-full md:w-1/2	 lg:w-1/2 xl:w-1/2 2xl:w-1/2">
					<img src="<?= $baseUrl ?>src/img/vestimenta/Mujeres-v2.png" class="w-full sm:w-full md:w-1/2	 lg:w-1/2 xl:w-1/2 2xl:w-1/2">


				</div>
			</div>
		</div>

	</div>

	<!-- HASHTAG -->
	<div class="d-flex flex-column py-10 bg-one sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-3xl 2xl:text-3xl px-5 pb-30 " id="Mesa_de_regalos">
		<!-- <div class="w-full sm:w-full md:w-full  lg:w-9/12w-8/12 2xl:w-8/12	 	 m-auto">
					<img src="<?= $baseUrl ?>src/img/puntos/Punto_8/c.png" class="w-full sm:w-full md:w-full  lg:w-9/12 xl:w-9/12 2xl:w-9/12 m-auto " loading="lazy">
			</div> -->
		<div class="d-flex flex-column align-items-center justify-content-center  sm:pb-2 md:pb-2  lg:pb-2 xl:pb-2 2xl:pb-2 pb-24">
			<p class="text-center flex justify-center text-3xl	 sm:text-3xl md:text-3xl	 lg:text-3xl xl:text-6xl 2xl:text-6xl fonttitle beige mt-20  sm:mt-5 md:mt-5  lg:mt-10 2xl:mt-10">
				Mesa de regalos
			</p>
			<img src="<?= $baseUrl ?>src/img/elementos/sobre_Iconos-02.png" class="w-44 m-auto " loading="lazy">
			<div class="">
				<p class="text-center  mt-0  sm:mt-5 md:mt-10  lg:mt-20 2xl:mt-20">
					Tu compañía es todo lo que anhelamos, como muchos saben,<br />
					nuestro hogar ya cuenta con lo necesario, en caso de desear hacernos un regalo,<br />
					este puede ser en efectivo, los cuales podrán colocar en un pequeño<br />
					sobre el día de la boda, o por medio de transferencia.
				</p>
				<br />

				<p class="text-center mt-0  sm:mt-5 md:mt-10  lg:mt-20 2xl:mt-20 rosa20 ">
					<span class="font-bold">Nombre : </span>Vanessa Viridiana Aceves Zamudio <br />
					<span class="font-bold">Cuenta clabe : </span>002540702036512344 <br />
					<span class="font-bold">Número de tarjeta : </span>5204 1660 5910 3392 <br />
					<span class="font-bold">Banco : </span>Banamex <br />

				</p>
			</div>
		</div>
	</div>
	<!--Mesa de regalos!-->
	<!--FIN Mesa de regalos!-->
	<!--Firmas!-->
	<div style="background-color: #FFF;" class="py-10">
		<div class=" justify-content-center pb-10" id="LIBRODEFIRMAS">
			<p class="text-center flex justify-center text-3xl	 sm:text-3xl md:text-3xl	 lg:text-3xl 2xl:text-6xl 2xl:text-6xl fonttitle beige mt-20  sm:mt-5 md:mt-5  lg:mt-10 2xl:mt-10">
				Libro de Firmas
			</p>

		</div>

		<div class="text-sm sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-2xl 2xl:text-2xl	browser-default">
			<!--Inicio carroucel!-->
			<div class="max-w-2xl mx-auto text-sm sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-2xl 2xl:text-2xl	 h-fit browser-default divcarro" style=" border:solid 1px #162335; background-color: #162335; -webkit-border-radius: 3px!important;  -moz-border-radius: 3px!important;  border-radius: 3px!important; margin-top:50px; margin-bottom: 50px;">

				<div class="slider" style="box-shadow:none!important ;border:none!important; ">
					<?php foreach ($deseos as $deseo) { ?>
						<div class="text-lg	 text-center text-white">
							<p class="text-sm sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-2xl 2xl:text-2xl	browser-default">"<?php echo $deseo->nombre; ?>"</p><br />

							<p class="text-sm sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-2xl 2xl:text-2xl	browser-default">
								-<?php echo $deseo->ffirma; ?> |<br />
							</p>
							<div class="flex justify-center">
								<p class="text-sm sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-2xl 2xl:text-2xl	browser-default"><?php echo $deseo->deseo; ?></p>
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#FF3D34" class="w-5">
									<path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
								</svg>


							</div>

						</div>
					<?php } ?>



				</div>


			</div>



			<!--Fin carroucel!-->
			<form class="max-w-2xl mx-auto px-5 text-sm sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-3xl 2xl:text-3xl	browser-default" action="<?= $baseUrl ?>Deseos/store" method="POST" autocomplete="off" name="buenosdeseos" id="buenosdeseos">

				<div class="relative z-0 w-full mb-5 group">
					<label for="Firstname" class="text-sm sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-2xl 2xl:text-2xl	browser-default">Nombre</label><br />
					<input type="text" name="nombre" id="Firstname" class="browser-default pl-1 block py-2.5 px-0 w-full text-md text-gray-900   border-b-2 border-gray-300 text-sm sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-2xl 2xl:text-2xl" placeholder=" " required />

				</div>


				<div class="relative z-0 w-full mb-5 group">
					<label for="dance" class="text-sm sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-2xl 2xl:text-2xl	browser-default">Deseos</label><br />
					<textarea name="deseos" id="" rows="6" required class="h-14	 browser-default pl-1 block py-2.5 px-0 w-full text-xs text-gray-900   border-b-2 border-gray-300 text-sm sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-2xl 2xl:text-2xl	browser-default"></textarea>

				</div>
				<button type="submit" style="background-color: #E3B883; height: 45px;" class="azul  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Firmar</button>
			</form>
		</div>

	</div>
	<!--Fin firmas!-->
	<!--Asistencias!-->
	<div class="d-flex flex-column py-10 bg-one sm:text-xl	md:text-xl		 lg:text-lg 2xl:text-3xl 2xl:text-3xl px-5 pb-30 " id="ASISTENCIA">
		<!-- <div class="w-full sm:w-full md:w-full  lg:w-9/12w-8/12	 2xl:w-8/12	 	 m-auto">
					<img src="<?= $baseUrl ?>src/img/puntos/Punto_8/c.png" class="w-full sm:w-full md:w-full  lg:w-9/12 xl:w-9/12 2xl:w-9/12 m-auto " loading="lazy">
			</div> -->
		<div class="d-flex flex-column align-items-center justify-content-center">
			<div class="mt-20" id="section_asistencia">
				<div class="">
					<!--Botones!-->
					<div class="">
						<!--Fin checkbox!-->
						<div class="w-full sm:w-full md:w-full  lg:w-10/12	 xl:w-10/12	 2xl:w-10/12 m-auto">
							<!-- <img src="<?= $baseUrl ?>src/img/puntos/Punto_8/f.png" class="w-full		 m-auto " loading="lazy"> -->
						</div>
						<p class="text-center text-4xl beige fonttitle	">
							Confirmación de asistencia
						</p>
						<p class="pt-10 text-center flex justify-center mt-10">Aunque nos gusten los niños y amamos a sus hijos, <br />creemos que necesitas una noche libre,<br />
							esta será una celebración SOLO PARA ADULTOS.</p>
						<p class="text-center text-3xl mt-10">
							<?php echo isset($_GET['invitado']) ? ($invitado ? '' . $invitado->Nombre : '') : '' ?>

						</p>
						<div class=" w-full flex justify-center gap-8 pt-10">
							<div>
								<input class="hidden asiste" id="radio_1" type="radio" name="radio" value="1">
								<label
									class="  flex justify-center   w-10	h-10 border-2 border-white cursor-pointer rounded-full text-white "
									style="background-color: #162335;"
									for="radio_1">
									<span class=" font-semibold textcheckbox">Si</span>
								</label>
							</div>

							<div>
								<input class="hidden asiste" id="radio_2" type="radio" name="radio" value="2">
								<input type="hidden" name="nohuid" id="nohuid" value="<?php echo isset($_GET['invitado']) ? $invitado->uid : '' ?>">
								<label
									class=" flex justify-center   w-10	h-10 border-2 border-white cursor-pointer rounded-full  text-white"
									style="background-color: #162335;"
									for="radio_2">
									<span class=" font-semibold textcheckbox">NO</span>
								</label>
							</div>



						</div>
						<!--Fin checkbox!-->


					</div>
					<!--Fin de botones!-->
					<div class="row">
						<div class="col-md-12">
							<div class="flex justify-center">
								<form class="w-full sm:w-full md:w-full  lg:w-10/12	 xl:w-10/12	 2xl:w-10/12 m-auto  pt-10 hidden" action="<?= $baseUrl ?>ControllerXv/store" method="POST" autocomplete="off" name="asistencia" id="asistencia">
									<!-- <div class="relative z-0 w-full mb-5 group">
								<label for="invitado" class="font-Georgia text-white text-3xl" style="text-align: left!important;">Nombre del invitado</label><br /> -->
									<input type="hidden" name="huid" value="<?php echo isset($_GET['invitado']) ? $invitado->uid : '' ?>">
									<input type="hidden" name="nombre" id="Firstname"
										value="<?php echo isset($_GET['invitado']) ? ($invitado ? $invitado->Nombre : '') : '' ?>" />

									<!-- </div> -->
									<div class="w-full mb-5">
										<label for="pases" class="font-Georgia text-white text-3xl">#pases de adulto</label><br />
										<select name="pases" id="pases"
											type="text"
											class=" w-full my-2 px-4  text-sm browser-default" required " style=" background-color: #162335;">

											<?php
											if (isset($_GET['invitado'])) {

												if ($invitado->pases != '') {

													for ($i = 1; $i <= $invitado->pases; $i++) {

											?>
														<option value="<?php echo $i ?>"><?php echo $i ?></option>
											<?php }
												}
											} else {
												echo '<option value="0" selected >0</option>';
											}

											?>
										</select>
									</div>


									<div class="w-full mb-5">
										<label for="paseschildren" class="font-Georgia text-white text-3xl">#pases niño</label><br />
										<select name="paseschildren" id="paseschildren" class=" w-full my-2 px-4  text-sm browser-default" required " style=" background-color: #162335;">
											<option value="0" selected>0</option>
											<?php
											if (isset($_GET['invitado'])) {

												if ($invitado->paseschildren != '') {
											?>

													<?php
													for ($i = 1; $i <= $invitado->paseschildren; $i++) {
													?>
														<option value="<?php echo $i ?>"><?php echo $i ?></option>
											<?php }
												}
											}

											?>
										</select>
									</div>

									<div class="flex justify-center">
										<button type="submit" class="font-medium rounded-lg text-sm w-full sm:w-auto px-5 pb-3 pt-2 text-center  bg-rosa20 beige fonttitle browser-default" style="background-color: #162335;">Confirmación de asistencia</button>
									</div>

									<div class="mt-10">
										<div class="flex justify-center text-lg text-center">
											<p>Puedes confirmar asistencia vía whatsapp</p>
										</div>
										<div class="flex justify-center text-lg text-center mt-2">
											<img src="<?= $baseUrl ?>src/img/puntos/Punto_8/Icono.png" class="m-auto" loading="lazy" style="width:75px;" />
										</div>

										<div class="flex justify-center text-lg text-center mt-2">
											<a href="https://wa.link/iqkhxn" target="_blank" class="font-medium rounded-lg text-sm w-full sm:w-auto px-5 pb-3 pt-2 text-center  bg-rosa20 beige fonttitle browser-default" style="background-color: #162335; text-decoration: none !important;">
												Confirmación Silver
											</a>
										</div>


									</div>

								</form>
							</div>
							<div class="flex justify-center">
								<img src="<?= $baseUrl ?>src/img/elementos/elemento_stephy.png" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Fin de asistencias!-->
	</div>

	<!-- WEDDING PLANER -->

	</main>

	<!--Carga JS al final-->

	<script type="text/javascript" src="<?= $baseUrl ?>src/js/jquery.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



	<!-- <script type="text/javascript" src="src/js/materialize.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?= $baseUrl ?>src/js/aos.js"></script>
	<script type="text/javascript" src="<?= $baseUrl ?>src/js/app.js"></script>
	<script type="text/javascript" src="<?= $baseUrl ?>src/js/proyecto/actions.js"></script>
	<script type="text/javascript" src="<?= $baseUrl ?>src/js/proyecto/libroFirmas.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
	<script>
		$(document).ready(function() {

			let h = $(window).height();
			let hif = h - 100;
			let w = $(window).width();

			$('.galeria').bxSlider({
				controls: false,
				pager: false,
				infiniteLoop: true,
				responsive: true,
				auto: true,
				autoStart: true,
				pause: 5000,
				adaptiveHeight: true,
				useCSS: false,

			});


			if (w <= 999) {

				$('.divparallaxConteiner').css({
					'width': 'auto',
					'height': '300px',
				})


				$('.imgsmovil').css({
					'height': '10px!important',
					'display': 'none'

				})

				$('.parallaxlast2').css({
					'background': 'url(<?= $baseUrl ?>src/img/puntos/Punto_8/d.jpg) no-repeat center center',
					'-webkit-background-size': 'cover',
					'-moz-background-size': 'cover',
					'-o-background-size': 'cover',
					'background-size': '100% auto',
					'background-position': '-5%',


				})

				$('.parallaxlast_2').css({
					'background': 'url(<?= $baseUrl ?>src/img/save-the-date/IMG_7348.jpg) no-repeat center center',
					'-webkit-background-size': 'cover',
					'-moz-background-size': 'cover',
					'-o-background-size': 'cover',
					'background-size': 'cover',
					'background-size': '100% auto',

				})

				$('.parallaxlast3').css({
					'background': 'url(<?= $baseUrl ?>src/img/save-the-date/IMG_7760.jpg) no-repeat center center',
					'-webkit-background-size': 'cover',
					'-moz-background-size': 'cover',
					'-o-background-size': 'cover',
					'background-size': '100% auto',

				})

			} else if (w >= 1000) {

				$('.divparallaxConteiner').css({
					'display': 'block',
					'height': '700px',

				})


				$('.imgsmovil').css({
					'display': 'block'

				})

				$('.parallaxlast2').css({
					'background': 'none',
					'-webkit-background-size': 'cover',
					'-moz-background-size': 'cover',
					'-o-background-size': 'cover',
					'background-size': 'cover',

				})

				$('.parallaxlast_2').css({
					'background': 'none',
					'-webkit-background-size': 'cover',
					'-moz-background-size': 'cover',
					'-o-background-size': 'cover',
					'background-size': 'cover',

				})

				$('.parallaxlast3').css({
					'background': 'none',
					'-webkit-background-size': 'cover',
					'-moz-background-size': 'cover',
					'-o-background-size': 'cover',
					'background-size': 'cover',

				})
			}


			$('.slider').bxSlider({
				controls: false,
				pager: false,
				infiniteLoop: true,
				responsive: true,
				auto: true,
				autoStart: true,
				pause: 5000,
				adaptiveHeight: true,
				useCSS: false,

			});

		});

		$(window).on('resize', function() {
			let win = $(this);

			if (win.height() <= 999) {
				$('.divparallaxConteiner').css({
					'width': 'auto',
					'height': '300px',
				})


				$('.imgsmovil').css({
					'height': '10px!important',
					'display': 'none'

				})

				$('.parallaxlast2').css({
					'background': 'url(<?= $baseUrl ?>src/img/puntos/Punto_8/d.jpg) no-repeat center center',
					'-webkit-background-size': 'cover',
					'-moz-background-size': 'cover',
					'-o-background-size': 'cover',
					'background-size': '100% auto',
					'background-position': '-5%',


				})

				$('.parallaxlast_2').css({
					'background': 'url(<?= $baseUrl ?>src/img/save-the-date/IMG_7348.jpg) no-repeat center center',
					'-webkit-background-size': 'cover',
					'-moz-background-size': 'cover',
					'-o-background-size': 'cover',
					'background-size': 'cover',
					'background-size': '100% auto',

				})

				$('.parallaxlast3').css({
					'background': 'url(<?= $baseUrl ?>src/img/save-the-date/IMG_7760.jpg) no-repeat center center',
					'-webkit-background-size': 'cover',
					'-moz-background-size': 'cover',
					'-o-background-size': 'cover',
					'background-size': '100% auto',

				})
			}
			if (win.width() >= 1000) {

				$('.divparallaxConteiner').css({
					'display': 'block',
					'height': '700px',
				})

				$('.imgsmovil').css({
					'display': 'block'

				})

				$('.parallaxlast2').css({
					'background': 'none',
					'-webkit-background-size': 'cover',
					'-moz-background-size': 'cover',
					'-o-background-size': 'cover',
					'background-size': 'cover',

				})

				$('.parallaxlast_2').css({
					'background': 'none',
					'-webkit-background-size': 'cover',
					'-moz-background-size': 'cover',
					'-o-background-size': 'cover',
					'background-size': 'cover',

				})

				$('.parallaxlast3').css({
					'background': 'none',
					'-webkit-background-size': 'cover',
					'-moz-background-size': 'cover',
					'-o-background-size': 'cover',
					'background-size': 'cover',

				})
			}


		});
	</script>