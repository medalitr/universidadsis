<?php
include_once "menu.php";
$conexion=mysqli_connect('localhost','root','','udh');
?>
<table border="1">
    <tr>
       
        <th>Codigo</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th colspan="2">ACCIONES</th>

    </tr>
    <!-- TODO: cargar datos de los estudiantes -->
    <tr>
    <?php 
        $sql="SELECT * from estudiantes";
        
        
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			
            <td><?php echo $mostrar['codigo'] ?></td>
			<td><?php echo $mostrar['nombres'] ?></td>
			<td><?php echo $mostrar['apellidos'] ?></td>
            <td><?php echo $mostrar['telefono'] ?></td>
         
			<td><?php echo $mostrar['correo'] ?></td>
			
            <td><a href="update.php?id=<?php echo $mostrar['id']; ?>"  class="btn__update" >Editar</a></td>
			<td><a href="delete.php?id=<?php echo $mostrar['id']; ?>" class="btn__delete">Eliminar</a></td>
		</tr>
	<?php 
	}
	 ?>
    </tr>
</table>


