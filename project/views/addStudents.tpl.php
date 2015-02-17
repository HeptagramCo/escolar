<?php  

	if (isset($_POST['add'])) {
		$pass = Security::getEncrypt($_POST['pass']);
		$consulta = new StudentsModel();
		return $consulta->set($_POST['usuario'], 
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
	<h1 class="title-panel">Agregar Nuevo Estudiante</h1>
	<form action="" method="post">
		<input type="text" placeholder="Matricula" name="matricula" required>
		<input type="text" placeholder="Numero de Lista" name="lista" required>
		<input type="text" placeholder="Nombre" name="nombre" required>
		<input type="text" placeholder="Usuario" name="usuario" required>
		<input type="password" placeholder="Contraseña" name="pass" required>
		<input type="text" placeholder="Curp" name="curp" required>
		<input type="text" placeholder="Fecha Nacimiento" name="nacimiento">
		<input type="text" placeholder="Telefono" name="telefono" required>
		<input type="text" placeholder="Telefono Alternativo" name="telefonoA">
		<label for="Tutor">
			Tutor:
			<select required name="tutor">
				<?php foreach ($dataTutor as $row) {?>
					<option required value="<?=$row['id_tutor']?>"><?=$row['name_tutor']?></option>
				<?php }?>
			</select>
		</label>
		<textarea id="" cols="30" rows="10" placeholder="Direccion y numero" name="direccion"></textarea>
		<input type="text" placeholder="Codigo Postal" name="postal">
		<input type="text" placeholder="Ciudad" name="ciudad">
		<input type="text" placeholder="Municipio" name="municipio">
		<label for="Sexo">Sexo:</label>
			<input required type="radio" name="sex" value="Hombre"><label class="labeldentro" for="Hombre">Hombre</label>
			<input required type="radio" name="sex" value="Mujer"><label class="labeldentro" for="Mujer">Mujer</label>
		<label for="Grupo">
			Grupo:
			<select required name="grupo">
				<?php foreach ($dataGroups as $row) {?>
					<option  value="<?=$row['id_groups']?>"><?=$row['year_section_groups']?></option>
				<?php }?>
			</select>
		</label>
		<input type="text" placeholder="Alguna Enfermedad" name="enfermedad">
		<input type="hidden" value="<?=$idS?>" name="school">
		<div class="submit-btn">
			<input type="submit" name="add" value="Guardar Alumno">
		</div>
	</form>
</section>