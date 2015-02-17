<?php
	if($values == null){
		session_destroy();
	}else{
		foreach($values as $row){
			$user = $row["name_user"];
		}

		if($user == $session){
			return header('Location:'.Rutas::getDireccion('admin'));
		}else{
			session_destroy();
		}

	}