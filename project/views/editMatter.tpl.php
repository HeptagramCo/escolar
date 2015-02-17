<?php  

	if (isset($_POST['add'])) {
		$consulta = new MatterModel();
		return $consulta->edit($_POST['id'],
			['nombre' => $_POST['nombre'] ]);
	}

?>

<section id="editmatter">
	<div id="breadcrumb">
		<a href="/admin">Home</a>
		<a href="/matter">> Materias</a>
	</div>
	<h1 class="title-panel">Editar Materia</h1>
	<form action="" method="post">
		<?php foreach ($datamatter as $row ) { ?>
		<input type="text" placeholder="Nombre" name="nombre" required value="<?=$row['name_subject_matter'] ?>">
		<input type="hidden" value="<?=$_GET['id']?>" name="id">
		<div class="submit-btn">
			<input type="submit" name="add" value="Guardar Materia">
		</div>
		<?php } ?>
	</form>
	</form>
</section>