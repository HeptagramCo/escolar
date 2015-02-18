<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$title ?></title>
	<link rel="stylesheet" href="<?=Rutas::getDireccion('media/css/estilos.css') ?>">
	<script src="<?=Rutas::getDireccion('media/js/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
</head>
<body>
	<header id="cabezera">
		<div id="company">
			<a href="/">Sistema Escolar Nellye Campobello</a>
		</div>
		<div id="control-account">
			<div class="admin">
				<div>
					<p>Bienvenido Administrador</p>
					<p><?=$user; ?></p>
				</div>
				<span class="icon-down"></span>
				<!-- Elemento Desplegable -->
				<div class="show-content-user">
					<ul>
						<a href=""><li>Editar Perfil</li></a>
						<a href=""><li>Ayuda</li></a>
						<a href=""><li>Reportar Problema</li></a>
					</ul>
				</div>
			</div>
			<div class="close">
				<a href="/deleteSession"><span class="icon-close"></span></a>
			</div>
		</div>
	</header>
	
	

	
	
	<?=$tpl_content?>
	<script src="<?=Rutas::getDireccion('media/js/jquery.js')?>"></script>
	<script src="<?=Rutas::getDireccion('media/js/basic-animation.js')?>"></script>
	<script src="/media/js/search.js"></script>
    
</body>
</html>