
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web compras</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
<h1>Aprovisionar Productos - alexander_suntaxi_acosta</h1>
<?php
include "conexion.php";


/* Se muestra el formulario la primera vez */
if (!isset($_POST) || empty($_POST)) { 

	$almacenes = obtenerALMACEN($db);
	$PRODUCTOS=obtenerProductos($db);
	
    /* Se inicializa la lista valores*/
	echo '<form action="" method="post">';
?>
<div class="container ">
<!--Aplicacion-->
<div class="card border-success mb-3" style="max-width: 30rem;">
<div class="card-header">Datos Producto</div>
<div class="card-body">
	
	<div class="form-group">
	<label for="categoria">almacenes:</label>
	<select name="almacenes">
	<?php foreach($almacenes as $almacen_N) : ?>
			<option> <?php echo $almacen_N ?> </option>
		<?php endforeach; ?>
	</select>
    <label for="categoria">PRODUCTO:</label>
	<select name="productos">
	<?php foreach($PRODUCTOS as $PRODUCTOS_NO) : ?>
			<option> <?php echo $PRODUCTOS_NO ?> </option>
		<?php endforeach; ?>
	</select> 
	<div class="form-group">
        cantidad <input type="text" name="cantidad" placeholder="cantidad" class="form-control">
    </div>
	</div>
	</BR>
<?php
	echo '<div><input type="submit" value="Alta Producto"></div>
	</form>';
} else { 
  

   




var_dump($_POST) ;
$ALMACEN=$_POST['almacenes'];
$CANTIDAD=$_POST['cantidad'];



 $ID_PRODUCTO= ObtenerID_produ($db,$_POST['productos']);

  $sql = "INSERT INTO ALMACENA (NUM_ALMACEN,ID_PRODUCTO,CANTIDAD) VALUES ('$ALMACEN', '$ID_PRODUCTO','$CANTIDAD');";

	ejecutarSQL($db,$sql);
   


   // Aquí va el código al pulsar submit
    null;
	
}
?>

<?php
function ejecutarSQL($db,$sql){

    


    echo "<br>";
    
    if (mysqli_query($db, $sql)) {
    
        echo "New record created successfully";
    
    } else {
    
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    
    }
}



function ObtenerID_produ($db,$nombre) {
	$ID_PRODUCTO="";
	echo $nombre;
	$sql = "SELECT ID_PRODUCTO  FROM PRODUCTO where NOMBRE='$nombre'";
	
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			
			$ID_PRODUCTO = $row['ID_PRODUCTO'];
		}
	}
	return $ID_PRODUCTO;
}

function obtenerALMACEN($db) {
	$ALMACEN = array();
	
	$sql = "SELECT NUM_ALMACEN  FROM ALMACEN";
	
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