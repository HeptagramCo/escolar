<section id="students-content">
	<div id="breadcrumb">
		<a href="/adminteacher">Home</a>
	</div>
	<h1 class="title-panel">Administrar Estudiantes</h1>
	<table class="table-primary-students" cellpadding="10">
		<tr class="titles-t-p">
			<th>Numero de Lista: </th>
			<th>Codigo de Barras</th>
			<th>Matricula:</th>
			<th>Nombre:</th>
			<th>Curp:</th>
			<th>Telefono:</th>
			<th>Direccion:</th>
			<th>Codigo Postal</th>
			<th>Sexo</th>
		</tr>
		<?php foreach ($values as $row) {
		?>
		<tr>
			<td><?=$row["numberList_students"]?></td>
			<td><?=$row["user_students"]?></td>
			<td><?=$row["enrollment"]?></td>
			<td><?=$row["name_students"]?></td>
			<td><?=$row["curp_students"]?></td>
			<td><?=$row["phone_students"]?></td>
			<td><?=$row["address_students"]?></td>
			<td><?=$row["postal_code_students"]?></td>
			<td><?=$row["sex_students"]?></td>
		</tr>
		<?php } ?>
	</table>
</section>