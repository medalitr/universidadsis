<?php
	include_once 'config/conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM estudiantes WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$codigo=$_POST['codigo'];
		$nombres=$_POST['nombres'];
		$apellidos=$_POST['apellidos'];
		$telefono=$_POST['telefono'];
		$correo=$_POST['correo'];
		$id=(int) $_GET['id'];

		if(!empty($codigo) &&!empty($nombres) && !empty($apellidos) && !empty($telefono) && !empty($correo) ){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_update=$con->prepare(' UPDATE estudiantes SET  
					codigo=:codigo,
					nombres=:nombres,
					apellidos=:apellidos,
					telefono=:telefono,
					correo=:correo,
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':codigo' =>$codigo,
					':nombres' =>$nombres,
					':apellidos' =>$apellidos,
					':telefono' =>$telefono,
					':correo' =>$correo,
					':id' =>$id
				));
				header('Location: index.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Estudiante</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>EDITAR </h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="codigo" value="<?php if($resultado) echo $resultado['codigo']; ?>" class="input__text">
				<input type="text" name="nombres" value="<?php if($resultado) echo $resultado['nombres']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="apellidos" value="<?php if($resultado) echo $resultado['apellidos']; ?>" class="input__text">
				</div>
			<div class="form-group">
				<input type="text" name="telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" class="input__text">
			</div>

			<div class="form-group">
				<input type="text" name="correo" value="<?php if($resultado) echo $resultado['correo']; ?>" class="input__text">
			</div>



			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
