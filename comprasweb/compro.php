
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web compras</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
<h1>Compra de Productos - alexander_suntaxi_acosta</h1>
<?php
include "conexion.php";


/* Se muestra el formulario la primera vez */
if (!isset($_POST) || empty($_POST)) { 

	
	$PRODUCTOS=obtenerProductos($db);
	$CLIENTES=obtenecliente($db);
    /* Se inicializa la lista valores*/
	echo '<form action="" method="post">';
?>
<div class="container ">
<!--Aplicacion-->
<div class="card border-success mb-3" style="max-width: 30rem;">
<div class="card-header">Datos CLIENTES</div>
<div class="card-body">
	
	<div class="form-group">
	
    <label for="categoria">PRODUCTO:</label>
	<select name="productos">
	<?php foreach($PRODUCTOS as $PRODUCTOS_NO) : ?>
			<option> <?php echo $PRODUCTOS_NO ?> </option>
		<?php endforeach; ?>
	</select> 


    <label for="categoria">clientes:</label>
	<select name="clientes">
	<?php foreach($CLIENTES as $CLIENTE) : ?>
			<option> <?php echo $CLIENTE ?> </option>
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
	
var_dump($_POST);
   /* 
	NIF VARCHAR(9)
	ID_PRODUCTO VARCHAR(5)
	FECHA_COMPRA DATE
	UNIDADES INTEGER
	*/
	$NIF=$_POST['clientes'];
	$CANTIDADModi=$_POST['cantidad'];
	$nombre=$_POST['productos'];
	$ID_PRODUCTO= Obtener_IDPRODUCTO($db,$nombre);

echo	$id_almacen=AlmacenDisponible($db,$ID_PRODUCTO,$CANTIDADModi);
	
if(empty($id_almacen))
echo "no es valido esa cantidad";
else{
	echo  "<br>";
	$CANTIDAD=obtenerCantidad($db,$ID_PRODUCTO,$id_almacen);
	$nuevacantidad=$CANTIDAD-$CANTIDADModi;
	/*esto crea la hora*/
	$hoy=date('Y-m-d h:m:s');
		
$sql = "INSERT INTO COMPRA (NIF,ID_PRODUCTO,FECHA_COMPRA,UNIDADES) VALUES ('$NIF','$ID_PRODUCTO','$hoy','$CANTIDADModi');";
	ejecutarSQL($db,$sql);
$sql = "UPDATE ALMACENA SET CANTIDAD='$nuevacantidad' WHERE ID_PRODUCTO='$ID_PRODUCTO' and NUM_ALMACEN='$id_almacen' ";
	ejecutarSQL($db,$sql);

}

	//	
//	$Id_productoV=validacion($db,$ID_PRODUCTO,$CANTIDADModi);
//	if(empty($Id_productoV))
//	echo "no es valido esa cantidad";
/*	else{
		
		$nuevacantidad=$CANTIDAD-$CANTIDADModi;
		$hoy = date("Y-m-d");   
		echo $hoy;
		//$sql = "INSERT INTO COMPRA (NIF,ID_PRODUCTO,FECHA_COMPRA,UNIDADES) VALUES ('$NIF','$Id_productoV','$hoy','$CANTIDADModi');";
		//ejecutarSQL($db,$sql);
		//$sql = "UPDATE ALMACENA SET CANTIDAD='$nuevacantidad' WHERE ID_PRODUCTO='$ID_PRODUCTO'";
		//ejecutarSQL($db,$sql);
	}
  */
    null;
	
}
?>

<?php

function AlmacenDisponible($db,$ID_PRODUCTO,$cantidadAresta){
	$NUM_ALMACEN="";
	$sql = "SELECT NUM_ALMACEN  FROM ALMACENA where ID_PRODUCTO='$ID_PRODUCTO' and CANTIDAD >= $cantidadAresta ";
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			
			$NUM_ALMACEN = $row['NUM_ALMACEN'];
		}
	}
	
	return $NUM_ALMACEN;


}

function obtenerCantidad($db,$ID_PRODUCTO,$NUM_ALMACEN){
	$CANTIDAD=0;
	$sql = "SELECT CANTIDAD  FROM ALMACENA where ID_PRODUCTO='$ID_PRODUCTO' and NUM_ALMACEN='$NUM_ALMACEN'";
	
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			
			$CANTIDAD = $row['CANTIDAD'];
		}
	}

	return $CANTIDAD;


}
/*
function validacion($db,$ID_PRODUCTO,$CANTIDADModi){
   
    $CANTIDAD=0;
	$sql = "SELECT ID_PRODUCTO  FROM ALMACENA where ID_PRODUCTO='$ID_PRODUCTO' and CANTIDAD >= '$CANTIDADModi'";
	
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			
			$CANTIDAD = $row['ID_PRODUCTO'];
		}
	}

	return $CANTIDAD;


}
*/

function ejecutarSQL($db,$sql){

    


    echo "<br>";
    
    if (mysqli_query($db, $sql)) {
    
        echo "New record created successfully";
    
    } else {
    
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    
    }
}
function Obtener_IDPRODUCTO($db,$nombre) {
	$ID_PRODUCTO="";

	$sql = "SELECT ID_PRODUCTO  FROM PRODUCTO where NOMBRE='$nombre'";

	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			
			$ID_PRODUCTO = $row['ID_PRODUCTO'];
		}
	}
	return $ID_PRODUCTO;

}
function obtenerProductos($db) {
	$ALMACEN = array();
	
	$sql = "SELECT DISTINCT NOMBRE  FROM PRODUCTO,ALMACENA where producto.Id_producto=almacena.Id_producto ";
	$sql=strtoupper($sql);
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {

		while ($row = mysqli_fetch_assoc($resultado)) {
			$ALMACEN[] = $row['NOMBRE'];
		}
	}
	return $ALMACEN;
}
function obtenecliente($db) {
	$CLIENTES = array();
	
	$sql = "SELECT NIF  FROM CLIENTE";
	
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {

		while ($row = mysqli_fetch_assoc($resultado)) {
			$CLIENTES[] = $row['NIF'];
		}
	}
	return $CLIENTES;
}
	




?>


</body>
</html>
