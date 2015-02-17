<?php  

	if (isset($_POST['add'])) {
		$consulta = new GroupsModel();
		return $consulta->edit($_POST['id'],
			['nombre' => $_POST['nombre'] ]);
	}

?>

<section id="editgroup">
	<h1 class="title-panel">Editar Grupo</h1>
	<form action="" method="post">
		<?php foreach ($datagroup as $row ) { ?>
		<input type="text" placeholder="Nombre" name="nombre" required value="<?=$row['year_section_groups'] ?>">
		<input type="hidden" value="<?=$_GET['id']?>" name="id">
		<div class="submit-btn">
			<input type="submit" name="add" value="Guardar Grupo">
		</div>
		<?php } ?>
	</form>
	</form>
</section>