<section id="group-content">
	<div id="breadcrumb">
		<a href="/admin">Home</a>
	</div>
	<h1 class="title-panel">Administrar Grupos</h1>
	<article class="actions-basics">
		<form action="">
			<input type="text" placeholder="Buscar...">
			<input type="submit" value="Buescar">
		</form>
		<div>
			<button class="btn-add"><a href="/groups/add">Añadir Grupo</a></button>
		</div>
	</article>
	<table class="table-primary-group">
		<tr class="titles-t-p">			
			<th>Año y Seccion:</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</tr>
		<?php foreach ($values as $row) {
		?>
		<tr>
			<td><?=$row["year_section_groups"]?></td>
			<td><a href="groups/edit?id=<?=$row['id_groups'];?>">Editar</a></td>
			<td><a href="groups/delete?id=<?=$row['id_groups'];?>">Eliminar</a></td>
		</tr>
		<?php } ?>
	</table>
</section>