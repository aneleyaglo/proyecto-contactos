<h1> Nuevo Contacto</h1>

<?php

$input_c_email = array(
	'name'  	=> 'c_email',
	'id' 		=> 'c_email',
	'maxlength' => '120',
	'size'		=> '100',
	'value'		=> set_value('c_email',@$datos_contactos[0]->c_email) //esto se usa para repoblar el form y que no se vacie
);

$input_c_nombre = array(
	'name'  	  => 'c_nombre',
	'id' 		  => 'c_nombre',
	'maxlength'   => '120',
	'size'		  => '50',
	'value'		=> set_value('c_nombre',@$datos_contactos[0]->c_nombre)
);

$input_c_telefono = array(
	'name'  	=> 'c_telefono',
	'id' 		=> 'c_telefono',
	'maxlength' => '20',
	'size'		=> '18',
	'value'		=> set_value('c_telefono',@$datos_contactos[0]->c_telefono)
);

$input_c_edad = array(
	'name'  	=> 'c_edad',
	'id' 		=> 'c_edad',
	'maxlength' => '3',
	'size'		=> '4',
	'value'		=> set_value('c_edad',@$datos_contactos[0]->c_edad)
);

$opciones = array(
	'0'			=> 'Inactivo' ,
	'1'			=> 'Activo',
	);
?>

<?php //echo validation_errors(); ?>

<?php echo form_open() ?>

<?php echo form_label('Email') ?><br />
<?php echo form_input($input_c_email) ?> <?php echo form_error('c_email'); ?> <br /><br />

<?php echo form_label('Nombre') ?><br />
<?php echo form_input($input_c_nombre) ?> <?php echo form_error('c_nombre'); ?> <br /><br />

<?php echo form_label('Telefono') ?><br />
<?php echo form_input($input_c_telefono) ?> <?php echo form_error('c_telefono'); ?> <br /><br />

<?php echo form_label('Edad') ?><br />
<?php echo form_input($input_c_edad) ?> <?php echo form_error('c_edad'); ?> <br /><br />

<?php echo form_label('Status') ?><br />       
<?php echo form_dropdown('c_status', $opciones,set_value('c_status'),@$datos_contactos[0]->c_status); //asi se repobla en el select ?><br /><br />

<?php echo form_submit('btn_enviar','Guardar') ?>

<?php echo form_close() ?>
