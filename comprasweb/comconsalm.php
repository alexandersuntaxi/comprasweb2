
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web compras</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
<h1>ALTA PRODUCTOS - alexander_suntaxi_acosta</h1>
<?php
include "conexion.php";


/* Se muestra el formulario la primera vez */
if (!isset($_POST) || empty($_POST)) { 

	$almacenes = obtenerALMACEN($db);
	
	
    /* Se inicializa la lista valores*/
	echo '<form action="" method="post">';
?>
<div class="container ">
<div class="card border-success mb-3" style="max-width: 30rem;">
<div class="card-header">CONSULTA ALMACEN</div>
<div class="card-body">
	
	<div class="form-group">
	<label for="categoria">almacenes:</label>
	<select name="almacenes">
	<?php foreach($almacenes as $almacen_N) : ?>
			<option> <?php echo $almacen_N ?> </option>
		<?php endforeach; ?>
	</select>
	</div>
	</BR>
<?php
	echo '<div><input type="submit" value="Alta Producto"></div>
	</form>';
} else { 
  

   




var_dump($_POST) ;
$ALMACEN=$_POST['almacenes'];
obteneInformacion($db,$ALMACEN);



   // Aquí va el código al pulsar submit
    null;
	
}
?>

<?php


function obteneInformacion($db,$ALMACEN){
    
    echo "<table border='1px'>";
    echo "
    <tr> 
    <td>ID_PRODUCTO </td> 
    <td> NOMBRE </td> 
    <td> Num_Almacen</td> 
    <td> CANTIDAD</td> 
    <tr>";
   
    $sql = "SELECT almacena.ID_PRODUCTO ,producto.NOMBRE, almacena.Num_Almacen,almacena.CANTIDAD FROM ALMACENA,PRODUCTO where almacena.ID_PRODUCTO=producto.ID_PRODUCTO and almacena.Num_Almacen='$ALMACEN'";
    
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

function ejecutarSQL($db,$sql){

    


    echo "<br>";
    
    if (mysqli_query($db, $sql)) {
    
        echo "New record created successfully";
    
    } else {
    
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    
    }
}



function obtenerALMACEN($db) {
	$ALMACEN = array();
	
	$sql = "SELECT DISTINCT NUM_ALMACEN  FROM ALMACENA,PRODUCTO where PRODUCTO.ID_PRODUCTO=ALMACENA.ID_PRODUCTO";
	
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$ALMACEN[] = $row['NUM_ALMACEN'];
		}
	}
	return $ALMACEN;
}

function obtenerProductos($db) {
	$ALMACEN = array();
	
	$sql = "SELECT NOMBRE  FROM PRODUCTO";
	
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$ALMACEN[] = $row['NOMBRE'];
		}
	}
	return $ALMACEN;
}

	




?>


</body>
</html>