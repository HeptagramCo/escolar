<?php  

	if (isset($_POST['add'])) {

		foreach ($dataStudent as $row) {
			if ($row['user_students'] == $_POST['usuario']) {
				$repit = "si";
			}else{
				$repit = "no";
			}

		}

		$pass = Security::getEncrypt($_POST['pass']);
		$consulta = new StudentsModel();
		return $consulta->edit($_POST['id'], $repit, $_POST['usuario'], 
			['matricula' => $_POST['matricula'],
			 'lista' => $_POST['lista'],
			 'nombre' => $_POST['nombre'], 
			 'pass' => $pass,
			 'curp' => $_POST['curp'],
			 'nacimiento' => $_POST['nacimiento'],
			 'telefono' => $_POST['telefono'],
			 'telefonoA' => $_POST['telefonoA'],
			 'tutor' => $_POST['tutor'],
			 'direccion' => $_POST['direccion'],
			 'postal' => $_POST['postal'],
			 'ciudad' => $_POST['ciudad'],
			 'municipio' => $_POST['municipio'],
			 'sex' => $_POST['sex'],
			 'school' => $_POST['school'],
			 'enfermedad' => $_POST['enfermedad'],
			 'grupo' => $_POST['grupo']]);
	}

?>

<section id="addstudents">
	<div id="breadcrumb">
		<a href="/admin">Home</a>
		<a href="/students">> Alumnos</a>
	</div>
	<h1 class="title-panel">Editar Alumno</h1>
	<form action="" method="post">
		<?php foreach ($dataStudent as $row) { ?>
			<input type="text" placeholder="Matricula" name="matricula" value="<?=$row['enrollment'] ?>">
			<input type="text" placeholder="Numero de Lista" name="lista" value="<?=$row['numberList_students'] ?>">
			<input type="text" placeholder="Nombre" name="nombre" value="<?=$row['name_students'] ?>">
			<input type="text" placeholder="Usuario" name="usuario" value="<?=$row['user_students'] ?>">
			<input type="password" placeholder="Contraseña" name="pass">
			<input type="text" placeholder="Curp" name="curp" value="<?=$row['curp_students'] ?>">
			<input type="text" placeholder="Fecha Nacimiento" name="nacimiento" value="<?=$row['birth_students'] ?>">
			<input type="text" placeholder="Telefono" name="telefono" value="<?=$row['phone_students'] ?>">
			<input type="text" placeholder="Telefono Alternativo" name="telefonoA" value="<?=$row['phone_alternative_students'] ?>">
			<label for="Tutor">
				Tutor:
				<select name="tutor">
					<?php foreach ($dataTutor as $rows) {?>
						<option <?php if($row['id_tutor'] == $rows['id_tutor']){echo "selected";} ?> value="<?=$rows['id_tutor']?>"><?=$rows['name_tutor']?></option>
					<?php }?>
				</select>
			</label>
			<textarea id="" cols="30" rows="10" placeholder="Direccion y numero" name="direccion"><?=$row['address_students'] ?></textarea>
			<input type="text" placeholder="Codigo Postal" name="postal" value="<?=$row['postal_code_students'] ?>">
			<input type="text" placeholder="Ciudad" name="ciudad" value="<?=$row['city_students'] ?>">
			<input type="text" placeholder="Municipio" name="municipio" value="<?=$row['town_students'] ?>">
			<label for="Sexo">Sexo</label>
				<input <?php if($row['sex_students'] == "Hombre"){echo "checked = 'checked'";} ?> type="radio" name="sex" value="Hombre"><label class="labeldentro" for="Hombre">Hombre</label>
				<input <?php if($row['sex_students'] == "Hombre"){echo "checked = 'checked'";} ?> type="radio" name="sex" value="Mujer"><label class="labeldentro" for="Mujer">Mujer</label>
			<label for="Grupo">
				Grupo:
				<select name="grupo">
					<?php foreach ($dataGroups as $rows) {?>
						<option <?php if($row['id_groups'] == $rows['id_groups']){echo "selected";} ?> value="<?=$rows['id_groups']?>"><?=$rows['year_section_groups']?></option>
					<?php }?>
				</select>
			</label>
			<input type="text" placeholder="Alguna Enfermedad" name="enfermedad" value="<?=$row['disease_students'] ?>">
			<input type="hidden" value="<?=$idS?>" name="school">
			<input type="hidden" value="<?=$_GET['id']?>" name="id">
			<div class="submit-btn">
				<input type="submit" name="add" value="Guardar Alumno">
			</div>
		<?php } ?>
	</form>
</section>