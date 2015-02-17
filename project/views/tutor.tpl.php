<section id="tutor-content">
	<div id="breadcrumb">
		<a href="/admin">Home</a>
	</div>
	<h1 class="title-panel">Administrar Estudiantes</h1>
	<article class="actions-basics">
		<form action="">
			<input type="text" placeholder="Buscar...">
			<input type="submit" value="Buescar">
		</form>
		<div>
			<button class="btn-add"><a href="tutor/add">Añadir Usuario</a></button>
		</div>
	</article>
	<table class="table-primary-tutor">
		<tr class="titles-t-p">			
			<th>Nombre:</th>
			<th>Curp:</th>
			<th>Telefono:</th>
			<th>Editar:</th>
			<th>Eliminar:</th>
		</tr>
		<?php foreach ($values as $row) {
			# code...
		?>
		<tr>
			<td><?=$row["name_tutor"]?></td>
			<td><?=$row["curp_tutor"]?></td>
			<td><?=$row["phone_tutor"]?></td>
			<td><a href="tutor/edit?id=<?=$row['id_tutor'];?>">Editar</a></td>
			<td><a href="tutor/delete?id=<?=$row['id_tutor'];?>">Eliminar</a></td>
		</tr>
		<?php } ?>
	</table>
</section>