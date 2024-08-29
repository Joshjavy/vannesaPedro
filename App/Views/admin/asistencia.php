<script src="https://cdn.tailwindcss.com"></script>
<body class="position-relative sm:text-2xl	 text-2xl	 md:text-2xl		 lg:text-lg 2xl:text-3xl 2xl:text-3xl">
<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: '.$baseUrl.'Home/login');
}else{
  session_start();

?>
<nav class="admin">
    <ul>
      <li><a href="<?php $baseUrl?>invitados">Invitados</a></li>
      <li><a href="<?php $baseUrl?>asistencia">Asistencia</a></li>
      <li><a href="<?php $baseUrl?>" base="<?php echo $baseUrl?>" class="btnsalir">Salir</a></li>
    </ul>
  </nav>

<div class="w-1/2 m-auto">
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                
                <th>Pases adultos</th>
                <th>Pases niños</th>
                <th>Url</th>
                
            </tr>
        </thead>
        <tbody>
		<?php foreach($datos as $invitado){?>
            <tr>
                <td><?php echo  $invitado->Nombre ?></td>
                <td><?php echo $invitado->pases?></td>
                <td><?php echo $invitado->paseschildren?></td>
                <td><?php echo $site.'?invitado='.$invitado->uid?></td>
                
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.3/axios.min.js"></script>
<script type="text/javascript" src="<?= $baseUrl ?>src/js/proyecto/logout.js"></script>
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
<script>
	new DataTable('#example');
</script>
<?php } ?>