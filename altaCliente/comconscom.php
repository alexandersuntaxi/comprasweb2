
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
	
   


    <label for="categoria">clientes:</label>
	<select name="clientes">
	<?php foreach($CLIENTES as $CLIENTE) : ?>
			<option> <?php echo $CLIENTE ?> </option>
		<?php endforeach; ?>
	</select> 
   

	


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

 $dateI=date('Y-m-d', strtotime($_POST['fechaIn'])); 
  
  echo $_POST['clientes'];
  
$dateF=date('Y-m-d', strtotime($_POST['fechafinal'])); 
obteneInformacion($db,$_POST['clientes']);

    null;
	
}
?>

<?php



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
	

function obteneInformacion($db,$CLIENTE){
    
    echo "<table border='1px'>";
    echo "
    <tr> 
    <td>ID_PRODUCTO </td> 
    <td> NOMBRE_PRODUCTO </td> 
    <td> PRECIO</td> 
   
    <tr>";
   
    //$sql = "SELECT * FROM ALMACENA,PRODUCTO where almacena.ID_PRODUCTO=producto.ID_PRODUCTO and almacena.CANTIDAD>0 and almacena.Num_Almacen='$ALMACEN'";
    $sql = "SELECT PRODUCTO.ID_PRODUCTO,PRODUCTO.NOMBRE,PRODUCTO.PRECIO FROM COMPRA,PRODUCTO,CLIENTE where COMPRA.NIF='$CLIENTE' AND COMPRA.NIF=CLIENTE.NIF AND PRODUCTO.ID_PRODUCTO=COMPRA.ID_PRODUCTO AND 
	COMPRA.FECHA_COMPRA BETWEEN '2020-01-07' AND '2020-01-24'" ;
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


</body>
</html>