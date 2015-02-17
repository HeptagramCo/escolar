<?php  

	if (isset($_POST['add'])) {
		$consulta = new GroupMatterModel();
		return $consulta->edit($_POST['id'],
			['materias' => $_POST['materias'],
			'grupos' => $_POST['grupos'],
			]);
	}

?>

<section id="editrelation">
	<div id="breadcrumb">
		<a href="/admin">Home</a>
		<a href="/matter">> Materias</a>
		<a href="/matter/addRelation">> Relaciones</a>
	</div>
	<h1 class="title-panel">Editar Relacion</h1>
	<form action="" method="post">
		<label for="Materias">Materias</label>
		<select name="materias">
			<?php foreach ($valuesmaterias as $row) {?>
				<option value="<?=$row['id_subject_matter']?>"><?=$row['name_subject_matter']?></option>
			<?php }?>
		</select>
		<label for="Grupos">Grupos</label>
		<select name="grupos">
			<?php foreach ($valuesgrupos as $row) {?>
				<option value="<?=$row['id_groups']?>"><?=$row['year_section_groups']?></option>
			<?php }?>
		</select>
		<input type="hidden" value="<?=$_GET['id']?>" name="id">
		<div class="submit-btn">
			<input type="submit" name="add" value="Guardar Relacion">
		</div>
	</form>
</section>