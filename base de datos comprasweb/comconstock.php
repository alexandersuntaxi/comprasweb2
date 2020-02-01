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

    <label for="categoria">PRODUCTO:</label>
	<select name="productos">
	<?php foreach($PRODUCTOS as $PRODUCTOS_NO) : ?>
			<option> <?php echo $PRODUCTOS_NO ?> </option>
		<?php endforeach; ?>
	</select> 
	
	</div>
	</BR>
<?php
	echo '<div><input type="submit" value="Alta Producto"></div>
	</form>';
} else { 
  

   






$ID_PRODUCTO= ObtenerID_produ($db,$_POST['productos']);
obteneInformacion($db,$ID_PRODUCTO);

  // $sql = "INSERT INTO ALMACENA (NUM_ALMACEN,ID_PRODUCTO,CANTIDAD) VALUES ('$ALMACEN', '$ID_PRODUCTO','$CANTIDAD');";

//   ejecutarSQL($db,$sql);
   /*Consulta de Stock(comconstock.php): se mostrarán los productos en un desplegable 
   y se mostrará la cantidad disponible del producto seleccionado en cada uno de los almacenes */


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
   
	$sql = "SELECT ID_PRODUCTO  FROM PRODUCTO where NOMBRE='$nombre'";
    echo " <h1>".$nombre=strtoupper($nombre)."</h1>";
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			
			$ID_PRODUCTO = $row['ID_PRODUCTO'];
		}
	}
	return $ID_PRODUCTO;
}

function obteneInformacion($db,$ID_PRODUCTO){
    
    echo "<table border='1px'>";
    echo "
    <tr> 
    <td>NUM_ALMACEN </td> 
    <td> ID_PRODUCTO </td> 
    <td> cantidad</td> 
    <tr>";
   
    $sql = "SELECT *  FROM ALMACENA where ID_PRODUCTO='$ID_PRODUCTO'";
    $resultado = mysqli_query($db, $sql);
    if ($resultado) {
        while ($row = mysqli_fetch_assoc($resultado)) {
           echo "<tr>";
           visualizarfilas($row);
            echo "<tr>";
        $ID_PRODUCTO = $row['ID_PRODUCTO'];
        }
    }
    echo "</table>";
}

function visualizarfilas($row){
    foreach($row as $valor):
        echo "<td>  $valor </td>";
endforeach;
    
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

	



?>


</body>
</html>