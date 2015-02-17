<section id="group-content">
	<div id="breadcrumb">
		<a href="/admin">Home</a>
	</div>
	<h1 class="title-panel">Administrar Materias Y Relaciones</h1>
	<article class="actions-basics">
		<form action="">
			<input type="text" placeholder="Buscar...">
			<input type="submit" value="Buescar">
		</form>
		<div>
			<button class="btn-add"><a href="/matter/add">Añadir Materia</a></button>
		</div>
	</article>
	<table class="table-primary-group">
		<tr class="titles-t-p">			
			<th>Nombre Grupo:</th>
			<th>Editar</th>
		</tr>
		<?php foreach ($values as $row) {
		?>
		<tr>
			<td><?=$row["name_subject_matter"]?></td>
			<td><a href="matter/edit?id=<?=$row['id_subject_matter'];?>">Editar</a></td>
		</tr>
		<?php } ?>
	</table>
	<div class="botones_matter">
		<button><a href="/matter/addRelation">Ver y Relacionar Materias</a></button>
	</div>
</section>