<b><h1> Eliminar Contato </h1></b>

Quieres eliminar el contacto? :<b></b><u><?php  echo $datos_contactos[0]->c_nombre ?> </u></br>

<?php
	$input_con_id = array(
		'c_id' => $datos_contactos[0]->c_id
		)
?>

<?php echo form_open() ?> </br>

<?php echo form_hidden($input_con_id) ?>

<?php echo form_submit('btn_enviar','Eliminar') ?>

<?php echo form_close() ?>