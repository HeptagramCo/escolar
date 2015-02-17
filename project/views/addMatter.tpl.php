<?php  

	if (isset($_POST['add'])) {
		$consulta = new MatterModel();
		return $consulta->set(
			['nombre' => $_POST['nombre']]);
	}

?>

<section id="addmatter">
	<div id="breadcrumb">
		<a href="/admin">Home</a>
		<a href="/matter">> Materias</a>
	</div>
	<h1 class="title-panel">Agregar Nueva Materia</h1>
	<form action="" method="post">
		<input type="text" placeholder="Nombre Materia" name="nombre">
		<div class="submit-btn">
			<input type="submit" name="add" value="Guardar Materia">
		</div>
	</form>
</section>