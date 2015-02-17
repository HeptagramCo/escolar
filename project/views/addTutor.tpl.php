<?php  

	if (isset($_POST['add'])) {
		$pass = Security::getEncrypt($_POST['pass']);
		$consulta = new TutorModel();
		return $consulta->set($_POST['usuario'], 
			['nombre' => $_POST['nombre'], 
			 'pass' => $pass,
			 'curp' => $_POST['curp'],
			 'telefono' => $_POST['telefono'],
			 'direccion' => $_POST['direccion'],
			 'postal' => $_POST['postal'],
			 'sex' => $_POST['sex'],
			 'school' => $_POST['school']]);
	}

?>

<section id="addtutor">
	<div id="breadcrumb">
		<a href="/admin">Home</a>
		<a href="/tutor">> Tutores</a>
	</div>
	<h1 class="title-panel">Agregar Nuevo Tutor</h1>
	<form action="" method="post">
		<input type="text" placeholder="Nombre" name="nombre">
		<input type="text" placeholder="Usuario" name="usuario">
		<input type="password" placeholder="Contraseña" name="pass">
		<input type="text" placeholder="Curp" name="curp">
		<input type="text" placeholder="Telefono" name="telefono">
		<textarea id="" cols="30" rows="10" placeholder="Direccion y numero" name="direccion"></textarea>
		<input type="text" placeholder="Codigo Postal" name="postal">
		<label for="Sexo">Sexo</label>
			<input type="radio" name="sex" value="Hombre"><label class="labeldentro" for="Hombre">Hombre</label>
			<input type="radio" name="sex" value="Mujer"><label class="labeldentro" for="Mujer">Mujer</label>
		<input type="hidden" value="<?=$idS?>" name="school">
		<div class="submit-btn">
			<input type="submit" name="add" value="Guardar Tutor">
		</div>
	</form>
</section>