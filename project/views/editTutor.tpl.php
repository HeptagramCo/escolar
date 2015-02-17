<?php  
	if (isset($_POST['add'])) {
		foreach ($dataTutor as $row) {
			if ($row['user_tutor'] == $_POST['usuario']) {
				$repit = "si";
			}else{
				$repit = "no";
			}

		}
		$pass = Security::getEncrypt($_POST['pass']);
		$consulta = new TutorModel();
		return $consulta->edit($_POST['id'], $repit, $_POST['usuario'], 
			['nombre' => $_POST['nombre'], 
			 'user' => $_POST['usuario'],
			 'pass' => $pass,
			 'curp' => $_POST['curp'],
			 'telefono' => $_POST['telefono'],
			 'direccion' => $_POST['direccion'],
			 'postal' => $_POST['postal'],
			 'sex' => $_POST['sex'],
			 'school' => $_POST['school']]);
	}

?>

<section id="edittutor">
	<div id="breadcrumb">
		<a href="/admin">Home</a>
		<a href="/tutor">> Tutores</a>
	</div>
	<h1 class="title-panel">Editar Tutor</h1>
	<form action="" method="post">
		<?php foreach ($dataTutor as $row ) { ?>
		<form action="" method="post">
		<input type="text" placeholder="Nombre" name="nombre" required value="<?=$row['name_tutor']?>">
		<input type="text" placeholder="Usuario" name="usuario" required value="<?=$row['user_tutor']?>">
		<input type="password" placeholder="Contraseña" required name="pass" >
		<input type="text" placeholder="Curp" name="curp" required value="<?=$row['curp_tutor']?>">
		<input type="text" placeholder="Telefono" name="telefono" required value="<?=$row['phone_tutor']?>">
		<textarea id="" cols="30" rows="10" required placeholder="Direccion y numero" name="direccion"><?=$row['address_tutor']?></textarea>
		<input type="text" placeholder="Codigo Postal" required name="postal" value="<?=$row['postal_code_tutor']?>">
		<label for="Sexo">Sexo</label>
			<input type="radio" required name="sex" value="Hombre" <?php if($row['sex_tutor'] == "Hombre"){echo "checked = 'checked'";} ?>><label class="labeldentro" for="Hombre">Hombre</label>
			<input type="radio" required name="sex" value="Mujer" <?php if($row['sex_tutor'] == "Mujer"){echo "checked = 'checked'";} ?>><label class="labeldentro" for="Mujer">Mujer</label>
		<input type="hidden" value="<?=$idS?>" name="school">
		<input type="hidden" value="<?=$_GET['id']?>" name="id">
		<div class="submit-btn">
				<input type="submit" name="add" value="Guardar Tutor">
			</div>
		<?php } ?>
	</form>
	</form>
</section>