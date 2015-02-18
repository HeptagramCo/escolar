<section id="teachers-content">
	<div id="breadcrumb">
		<a href="/admin">Home</a>
	</div>
	<h1 class="title-panel">Administrar Profesores</h1>
	<article class="actions-basics">
		<form action="">
			<select name="by" id="by">
				<option value="enrollment_teachers">Matricula</option>
				<option value="name_teachers">Nombre</option>
				<option value="curp_teachers">CURP</option>
				<option value="phone_teachers">Telefono</option>
			</select>
			<input type="text" placeholder="Buscar..." id="search">
			<input type="submit" value="Buscar">
		</form>
		<div>
			<button class="btn-add"><a href="teachers/add">Añadir Maestro</a></button>
		</div>
	</article>
	<table class="table-primary-teachers" >
		<tr class="titles-t-p">
			<th>Matricula:</th>
			<th>Nombre:</th>
			<th>Curp:</th>
			<th>Telefono:</th>
			<th>Editar:</th>
			<th>Eliminar:</th>
		</tr>
		<?php foreach ($values as $row) {
		?>
		<tr>
			<td><?=$row["enrollment_teachers"]?></td>
			<td><?=$row["name_teachers"]?></td>
			<td><?=$row["curp_teachers"]?></td>
			<td><?=$row["phone_teachers"]?></td>
			<td><a href="teachers/edit?id=<?=$row['id_teachers'];?>">Editar</a></td>
			<td><a href="teachers/delete?id=<?=$row['id_teachers'];?>" id="eliminar">Eliminar</a></td>
		</tr>
		<?php }?>
	</table>

</section>


