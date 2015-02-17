<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>
	<link rel="stylesheet" href="<?=Rutas::getDireccion('media/css/estilos.css') ?>">
</head>
<body>

	<section id="box-login">
		<form action="" method="post">
			<input type="text" placeholder="Nombre de usuario" name="user" class="user_data">
			<input type="password" placeholder="Contraseña" name="password" class="password_data">
			<input type="submit" id="submit-form">
		</form>
	</section>

	<script src=<?=Rutas::getDireccion('media/js/jquery.js')?>></script>
	<script src="<?=Rutas::getDireccion('media/js/accessteachers.js')?>"></script>

	
</body>
</html>