<?php  

	if (isset($_POST['add'])) {
		$consulta = new GroupMatterModel();
		return $consulta->set(
			['materias' => $_POST['materias'],
			'grupos' => $_POST['grupos'],
			]);
	}

?>

<section id="group-content">
	<div id="breadcrumb">
		<a href="/admin">Home</a>
		<a href="/matter">> Materias</a>
	</div>
<h1 class="title-panel2">Agregar Nueva Relacion</h1>
	<div class="form-ctn">
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
			<div class="submit-btn">
				<input type="submit" name="add" value="Guardar Relacion">
			</div>
		</form>
	</div>
	
	
	<h1 class="title-panel2">Tus Materias y Grupos relacionados</h1>
	<table class="table-primary-group">
		<tr class="titles-t-p">			
			<th>Nombre Materia:</th>
			<th>Nombre Grupo:</th>
			<th>Editar</th>
		</tr>
		<?php foreach ($valuesgetnames as $row) {
		?>
		<tr>
			<td><?=$row["name_subject_matter"]?></td>
			<td><?=$row["year_section_groups"]?></td>
			<td><a href="/matter/editRelation/?id=<?=$row['id_group_matter'];?>">Editar</a></td>
		</tr>
		<?php } ?>
	</table>
</section>