
<?php
// We need to use sessions, so you should always start sessions using the below code.

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  echo'<meta http-equiv="refresh" content="0; url='.$baseUrl.'Home/login">';
	return false;
}else{
  
?>
<script src="https://cdn.tailwindcss.com"></script>
<body class="position-relative sm:text-2xl	 text-2xl	 md:text-2xl		 lg:text-lg 2xl:text-3xl 2xl:text-3xl">
<nav class="admin">
    <ul>
      <li><a href="#" id="liinvitados">Invitados</a></li>
      <li><a href="#" id="liasistencias">Asistencia</a></li>
      <li><a href="<?php $baseUrl?>" base="<?php echo $baseUrl?>" class="btnsalir">Salir</a></li>
    </ul>
  </nav>

<div class="w-1/2 m-auto invitados">
	<?php if ($datos){?>
		<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Pases</th>
                <th>Pases niños</th>
                <th>url</th>
            </tr>
        </thead>
        <tbody>
		<?php foreach($datos as $invitado){?>
            <tr>
                <td><?php echo  $invitado->Nombre ?></td>
                <td><?php echo  $invitado->pases ?></td>
                <td><?php echo  $invitado->paseschildren ?></td>
                <td><?php echo $site.'?invitado='.$invitado->uid?></td>
                
            </tr>
        <?php } ?>
        </tbody>
    </table>
	<?php }else{?>
	<form action="<?php $baseUrl?>subirinvitados" method="POST" enctype="multipart/form-data">
			
			<div class="mb-3">
				<label for="archivo">Selecciona un archivo <code>.csv</code></label>
				<input type="file" class="form-control" name="archivo" id="archivo" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
			</div>
			<button class="btn btn-success" type="submit">Importar</button>
			</form>
	<?php } ?>
</div>


<div class="w-1/2 m-auto asistencias hidden">
	<?php if ($datos){?>
		<table id="asistencias" class="display" style="width:100%">
      <thead>
              <tr>
                  <th>Nombre</th>
                  <th>Pases adultos</th>
                  <th>Pases niños</th>
                  <th>Url</th>
                  
              </tr>
          </thead>
          <tbody>
      <?php foreach($asistencias as $invitado){?>
              <tr>
                  <td><?php echo  $invitado->Nombre ?></td>
                  <td><?php echo $invitado->pases?></td>
                  <td><?php echo $invitado->paseschildren?></td>
                  <td><?php echo $site.'?invitado='.$invitado->uid?></td>
                  
              </tr>
          <?php } ?>
          </tbody>
    </table>
	<?php }else{?>
	<form action="<?php $baseUrl?>subirinvitados" method="POST" enctype="multipart/form-data">
			
			<div class="mb-3">
				<label for="archivo">Selecciona un archivo <code>.csv</code></label>
				<input type="file" class="form-control" name="archivo" id="archivo" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
			</div>
			<button class="btn btn-success" type="submit">Importar</button>
			</form>
	<?php } ?>
</div>
</main>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.3/axios.min.js"></script>
<script type="text/javascript" src="<?= $baseUrl ?>src/js/proyecto/logout.js"></script>
<script type="text/javascript" src="<?= $baseUrl ?>src/js/proyecto/admin.js"></script>

<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
<script>
	new DataTable('#example');
  new DataTable('#asistencias');
</script>
<?php } ?>