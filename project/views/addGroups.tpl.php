<?php  

	if (isset($_POST['add'])) {
		$consulta = new GroupsModel();
		return $consulta->set(
			['nombre' => $_POST['nombre']]);
	}

?>

<section id="addgroups">
	<div id="breadcrumb">
		<a href="/admin">Home</a>
		<a href="/groups">> Grupos</a>
	</div>
	<h1 class="title-panel">Agregar Nuevo Grupo</h1>
	<form action="" method="post">
		<input type="text" placeholder="Grado, Seccion y Turno:" name="nombre">
		<div class="submit-btn">
			<input type="submit" name="add" value="Guardar Grupo">
		</div>
	</form>
</section>