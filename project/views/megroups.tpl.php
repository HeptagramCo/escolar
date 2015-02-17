<section id="group-content">
	<div id="breadcrumb">
		<a href="/adminteacher">Home</a>
	</div>
	<h1 class="title-panel">Mis Materias</h1>
	<table class="table-primary-group">
		<tr class="titles-t-p">			
			<th>Mis Materias:</th>
		</tr>
		<?php foreach ($values as $row) {
		?>
		<tr>
			<td><?=$row["name_subject_matter"]?></td>
		</tr>
		<?php } ?>
	</table>
</section>