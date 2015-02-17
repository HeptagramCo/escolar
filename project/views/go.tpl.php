<?php //$numeromaterias = 0; $total = 0;?>
<section id="go-students">
	<div id="breadcrumb">
		<a href="/admin">Home</a>
		<a href="/students">> Alumnos</a>
	</div>
	<div class="cont">
	<?php foreach ($values as $row) {?>
			<p><span>Clave: </span><?=$row["enrollment"]?></p>
			<p><span>Clave de Acceso (codigo de barras): </span><?=$row["user_students"]?></p>
			<p><span>Nombre: </span> <?=$row["name_students"]?></p>
			<p><span>Grupo: </span><?=$row["year_section_groups"]?></p>
			<p><span>Curp: </span><?=$row["curp_students"]?></p> 
			<p><span>Telefono: </span><?=$row["phone_students"]?></p>
			<p><span>Fecha de Nacimiento: </span><?=$row["birth_students"]?></p>
			<p><span>Sexo: </span><?=$row["sex_students"]?></p>
			<p><span>Telefono alternativo: </span><?=$row["phone_alternative_students"]?></p>
			<p><span>Direccion: </span><?=$row["address_students"]?></p>
			<p><span>Codigo Postal: </span><?=$row["postal_code_students"]?></p>
			<p><span>ENfermedad: </span><?=$row["disease_students"]?></p>
			<p><span>Ciudad: </span><?=$row["city_students"]?></p>
			<p><span>Estado: </span><?=$row["town_students"]?></p>
			
			<h1>Datos del Tutor:</h1>
			
			<p><span>ID de Tutor: </span><?=$row["id_tutor"]?></p>
			<p><span>Nombre: </span><?=$row["name_tutor"]?></p>
			<p><span>Curp: </span><?=$row["curp_tutor"]?></p>
			<p><span>Sexo: </span><?=$row["sex_tutor"]?></p>
			<p><span>Direccion: </span><?=$row["address_tutor"]?></p>
			<p><span>Codigo Postal: </span><?=$row["postal_code_tutor"]?></p>
			<p><span>Telefono: </span><?=$row["phone_tutor"]?></p>
	<?php } ?>
	</div>
</section>