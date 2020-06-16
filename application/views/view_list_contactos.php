<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Bootstrap 101 Template</title>

	<!-- Bootstrap -->
		<link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<h1> Listado de Contactos</h1>

<?php  if (empty($listado)) {   ?>
	
		<b><h2> Sin contactos</h2></b>
		
<?php 	} else {  ?>

 <b><h2> Tienes <?php echo(count($listado)) ?> contacto(s)</h2></b>
 <br/><br/>
 
 <table class="table">
 	
 	<tr>
 		<td>Nombre Contacto</td>
		<td>Opciones</td>
 	</tr>

 <?php 	foreach ($listado as $contacto) { ?><br/><br/>
	
	<tr>
				<td> <?php echo	$contacto->c_nombre; ?> </td>
				<td> <a href="<?php echo base_url() ?>index.php/contactos/modificar/<?php echo $contacto->c_id; ?>" class="btn btn-warning">Editar</a>
				<a href="<?php echo base_url() ?>index.php/contactos/eliminar/<?php echo $contacto->c_id; ?>" class="btn btn-danger">Eliminar</a>
				</td> 
	</tr>
			
	
 <?php 	} ?>
		
<?php } ?>
<br/><br/>
		
		<a href="<?php echo base_url() ?>index.php/contactos/agregar" class="btn btn-info"> Nuevo Contacto </a>

</table>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url() ?>js/bootstrap.min.js"> </script>
</body>
</html>

