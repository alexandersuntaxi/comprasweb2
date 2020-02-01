<?php
session_start();
include "conexion.php";
?>

<?php



/* Se muestra el formulario la primera vez */
if (!isset($_POST) || empty($_POST)) { 

	
	

    /* Se inicializa la lista valores*/
	echo '<form action="" method="post">';
?>
<div class="container ">
<!--Aplicacion-->
<div class="card border-success mb-3" style="max-width: 30rem;">
<div class="card-header">Datos CLIENTES</div>
<div class="card-body">
	
	<div class="form-group">
	
   


   

	


	<div class="form-group">
    fechaInicio <input type="date" name="fechaIn" class="form-control"><br>
    fechafinal <input type="date" name="fechafinal" class="form-control">
    
    </div>
	</div>
	</BR>
<?php
	echo '<div><input type="submit" value="Alta Producto"></div>
	</form>';
} else { 

 
obteneInformacion($db);

    null;
	
}



?>

<?php

function obteneInformacion($db){
  echo  $dateI=date('Y-m-d', strtotime($_POST['fechaIn'])); 
  echo "<br>";
  //echo $_POST['clientes'];
  
  echo  $dateF=date('Y-m-d', strtotime($_POST['fechafinal'])); 
    echo "<table border='1px'>";
    echo "
    <tr> 
    <td>ID_PRODUCTO </td> 
    <td> NOMBRE_PRODUCTO </td> 
    <td> PRECIO</td> 
   
    </tr>";
 
    //$sql = "SELECT * FROM ALMACENA,PRODUCTO where almacena.ID_PRODUCTO=producto.ID_PRODUCTO and almacena.CANTIDAD>0 and almacena.Num_Almacen='$ALMACEN'";
    $sql = "SELECT * FROM  COMPRA where COMPRA.FECHA_COMPRA BETWEEN '$dateI' AND '$dateF';";
    $resultado = mysqli_query($db, $sql);
    if ($resultado) {
        while ($row = mysqli_fetch_assoc($resultado)) {
           echo "<tr>";
           visualizarfilas($row);
            echo "<tr>";
      
        }
    }
    echo "</table>";
}


function visualizarfilas($row){
    foreach($row as $valor):
        echo "<td>  $valor </td>";
endforeach;
    
}


?>