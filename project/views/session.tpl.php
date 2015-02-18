<?php
	if($values == null){
		session_destroy();
	}else{
		foreach($values as $row){
			$user = $row["name_user"];
			Cookies::set("complete","Hola Bienvenido: ¡" .$user."!","20-s");
		}

		if($user == $session){
			return header('Location:'.Rutas::getDireccion('admin'));
		}else{
			session_destroy();
		}

	}