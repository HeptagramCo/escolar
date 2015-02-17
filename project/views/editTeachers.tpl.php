<?php 
	
	if (isset($_POST['add'])) {
		foreach ($dataTeacher as $row) {
			if ($row['user_teachers'] == $_POST['usuario']) {
				$repit = "si";
			}else{
				$repit = "no";
			}

		}

	
		$pass = Security::getEncrypt($_POST['pass']);
		$consulta = new TeachersModel();
		return $consulta->edit($_POST['id'], $repit, $_POST['usuario'],
			['matricula' => $_POST['matricula'], 
			 'nombre' => $_POST['nombre'], 
			 'user' => $_POST['usuario'],
			 'pass' => $pass,
			 'curp' => $_POST['curp'],
			 'nacimiento' => $_POST['nacimiento'],
			 'telefono' => $_POST['telefono'],
			 'direccion' => $_POST['direccion'],
			 'postal' => $_POST['postal'],
			 'sex' => $_POST['sex'],
			 'school' => $_POST['school'],
			 'grupo' => $_POST['grupo']]);
	}

?>

<section id="editteachers">
	<div id="breadcrumb">
		<a href="/admin">Home</a>
		<a href="/teachers">> Maestros</a>
	</div>
	<h1 class="title-panel">Editar Profesor</h1>
	<form action="" method="post">
		<?php foreach ($dataTeacher as $row ) { ?>
		<form action="" method="post">
		<input type="text" placeholder="Matricula" name="matricula" required value="<?=$row['enrollment_teachers']?>">
		<input type="text" placeholder="Nombre" name="nombre" required value="<?=$row['name_teachers']?>">
		<input type="text" placeholder="Usuario" name="usuario" required value="<?=$row['user_teachers']?>">
		<input type="password" placeholder="Contraseña" required name="pass" >
		<input type="text" placeholder="Curp" name="curp" required value="<?=$row['curp_teachers']?>">
		<input type="text" placeholder="Fecha Nacimiento" required name="nacimiento" value="<?=$row['birth_teachers']?>">
		<input type="text" placeholder="Telefono" name="telefono" required value="<?=$row['phone_teachers']?>">
		<textarea id="" cols="30" rows="10" required placeholder="Direccion y numero" name="direccion"><?=$row['address_teachers']?></textarea>
		<input type="text" placeholder="Codigo Postal" required name="postal" value="<?=$row['postal_code_teachers']?>">
		<label for="Sexo">Sexo</label>
			<input type="radio" required name="sex" value="Hombre" <?php if($row['sex_teachers'] == "Hombre"){echo "checked = 'checked'";} ?>><label class="labeldentro" for="Hombre">Hombre</label>
			<input type="radio" required name="sex" value="Mujer" <?php if($row['sex_teachers'] == "Mujer"){echo "checked = 'checked'";} ?>><label class="labeldentro" for="Mujer">Mujer</label>
		<label for="Grupo">
			Grupo:
			<select name="grupo">
				<?php foreach ($data as $row2) {?>
					<option <?php if($row2['id_groups'] == $row['id_groups']){echo "selected";} ?> value="<?=$row2['id_groups']?>"><?=$row2['year_section_groups']?></option>
				<?php }?>
			</select>
		</label>
		<input type="hidden" value="<?=$idS?>" name="school">
		<input type="hidden" value="<?=$_GET['id']?>" name="id">
		<div class="submit-btn">
			<input type="submit" name="add" value="Guardar Profesor">
		</div>
		<?php } ?>
	</form>
	</form>
</section>