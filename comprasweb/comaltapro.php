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

	$departamentos = obtenerDepartamentos($db);
	
	
    /* Se inicializa la lista valores*/
	echo '<form action="" method="post">';
?>
<div class="container ">
<!--Aplicacion-->
<div class="card border-success mb-3" style="max-width: 30rem;">
<div class="card-header">Datos Producto</div>
<div class="card-body">
		<div class="form-group">
        ID PRODUCTO <input type="text" name="idproducto" placeholder="idproducto" class="form-control" required>
        </div>
		<div class="form-group">
        NOMBRE PRODUCTO <input type="text" name="nombre" placeholder="nombre" class="form-control" required>
        </div>
		<div class="form-group">
        PRECIO PRODUCTO <input type="text" name="precio" placeholder="precio" class="form-control" required>
        </div>
	<div class="form-group">
	<label for="categoria">Categorías:</label>
	<select name="categoria">
	<?php foreach($departamentos as $departamento) : ?>
			<option> <?php echo $departamento ?> </option>
		<?php endforeach; ?>
	</select>
	</div>
	</BR>
<?php
	echo '<div><input type="submit" value="Alta Producto"></div>
	</form>';
} else { 
  

    $categoria=$_POST["categoria"];
    $nombre=$_POST["nombre"];
    $id_p=$_POST["idproducto"];
    $precio=$_POST["precio"];

    $sql = "SELECT ID_CATEGORIA  FROM CATEGORIA where NOMBRE='$categoria' ";
   $resultado = mysqli_query($db, $sql);
   $id_categoria= mysqli_fetch_assoc($resultado)['ID_CATEGORIA'];
    

  
    if(!validacionExistenciaCampo($db,$nombre,$id_p)){
        $sql = "INSERT INTO PRODUCTO (ID_PRODUCTO, NOMBRE,PRECIO,ID_CATEGORIA) 
        VALUES ('$id_p', '$nombre','$precio','$id_categoria');";
        ejecutarSql($db, $sql);
    }else{
        echo "ya existe el producto o la id";
    }

   echo "<br>";

   
 

   // Aquí va el código al pulsar submit
    null;
	
}
?>

<?php


function ejecutarSql($db, $sql){
    echo "<br>";
    
    if (mysqli_query($db, $sql)) {
    
        echo "New record created successfully";
    
    } else {
 echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }   
    
 

}


function validacionExistenciaCampo($db,$Nombre,$id){
    $existe=false;
    $sql = "SELECT * FROM PRODUCTO where NOMBRE='$Nombre' or ID_PRODUCTO='$id'";
    
if ($result=mysqli_query($db,$sql)){ 
    $rowcount=mysqli_num_rows($result);
    echo $rowcount;
    if($rowcount!=0){
        $existe=true; 
    }
}
return $existe;


}
function obtenerDepartamentos($db) {
	$departamentos = array();
	
	$sql = "SELECT NOMBRE  FROM CATEGORIA";
	
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$departamentos[] = $row['NOMBRE'];
		}
	}
	return $departamentos;
}


	




?>


</body>
</html>