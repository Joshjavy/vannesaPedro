<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: '.$baseUrl.'Home/login');
	
}
?>
<script src="https://cdn.tailwindcss.com"></script>
<body class="position-relative sm:text-2xl	 text-2xl	 md:text-2xl		 lg:text-lg 2xl:text-3xl 2xl:text-3xl">
<nav class="admin">
    <ul>
      <li><a href="<?php $baseUrl?>invitados">Invitados</a></li>
      <li><a href="<?php $baseUrl?>asistencia">Asistencia</a></li>
      <li><a href="<?php $baseUrl?>" base="<?php echo $baseUrl?>" class="btnsalir">Salir</a></li>
    </ul>
  </nav>


</main>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.3/axios.min.js"></script>
<script type="text/javascript" src="<?= $baseUrl ?>src/js/proyecto/logout.js"></script>