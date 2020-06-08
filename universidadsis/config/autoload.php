<?php
spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
    include_once "ConexionDB.php";
});
?>


<?php 
	include_once "ConexionDB.php";
	
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$conexion->prepare('DELETE FROM estudiantes WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>