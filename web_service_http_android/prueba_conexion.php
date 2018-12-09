<?php 
	 if (!($enlace = mysqli_connect('127.0.0.1', 'root', '','bd_escuela'))) {
    		die("Falló la conexión!!, ERROR: ".mysqli_connect_error());
  		}


	$respuesta = array();

	$sql = "SELECT * FROM alumnos";

	$consulta = mysqli_query($enlace, $sql);

	if (mysqli_num_rows($consulta) > 0) {
		$respuesta["alumnos"] = array();
		while($fila = mysqli_fetch_assoc($consulta)){
			$alumnos = array();
			$alumnos["nc"] = $fila["num_control"];
			$alumnos["n"] = $fila["nombre"];
			$alumnos["pa"] = $fila["primer_ap"];
			$alumnos["sa"] = $fila["segundo_ap"];
			$alumnos["s"] = $fila["semestre"];
			$alumnos["c"] = $fila["carrera"];
			$alumnos["e"] = $fila["edad"];
			array_push($respuesta["alumnos"], $alumnos);
		}

		$respuesta["exito"] = 1;
		echo json_encode($respuesta);

	}else{
		$respuesta["exito"] = 0;
		$respuesta["msj"] = "No hay registros";
		echo json_encode($respuesta);
	}


 ?>