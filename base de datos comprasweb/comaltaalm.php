<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web compras</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
<h1>ALTA ALMACEN - alexander_suntaxi_acosta</h1>
<?php
include "conexion.php";
include "Fvalidaciones.php";



/* Se muestra el formulario la primera vez */
if (!isset($_POST) || empty($_POST)) { 

	
	
	
    /* Se inicializa la lista valores*/
	echo '<form action="" method="post">';
?>
<div class="container ">
<!--Aplicacion-->
<div class="card border-success mb-3" style="max-width: 30rem;">
<div class="card-header"> Datos Almacenes</div>
<div class="card-body">
		<div class="form-group">
        localidad  <input type="text" name="localidad" placeholder="localidad" class="form-control">
       </div>
	

<?php
	echo '<div><input type="submit" value="Alta Producto"></div>
	</form>';
} else { 


 
/*Alta  de  Almacenes(comaltaalm.php):dar  de  alta  almacenes
  en  diferentes  localidades.El número de almacén será
  unnúmerosecuencial que comenzará
  en 10 y se incrementará de 10 en 10*/

  $localiad=$_POST['localidad'];
  $codigoAlmacen=incrementar($db);
  
  
  $sql = "INSERT INTO ALMACEN (NUM_ALMACEN,LOCALIDAD) VALUES ('$codigoAlmacen','$localiad');";
  if (validarlocalidad($db,$localiad)==false && $localiad ){
    altaAlmacenes($db,$sql);
  }else{
      echo "no se puede esta provincia";
  }
  
}
?>

<?php

function altaAlmacenes($db,$sql){
    echo "<br>";
    
    if (mysqli_query($db, $sql)) {
    
        echo "New record created successfully";
    
    } else {
    
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    
    }
}

function incrementar($db){
    $numeros=obteneValores($db);
    /*aqui esta todos los valores 
    recogidos de la base de datos 
  */
    
    if(count($numeros)==0)//aqui solo pasa la primera vez
    $Ultimovalor=10;
    else{
        $Ultimovalor=array_pop($numeros);
        $Ultimovalor=intval($Ultimovalor);
        $Ultimovalor+=10;
    }
    return $Ultimovalor;

    

}

function obteneValores($db) {
	$numero_almacen = array();
	
	$sql = "SELECT NUM_ALMACEN  FROM AlMACEN";
	
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$numero_almacen[] = $row['NUM_ALMACEN'];
		}
	}
	return $numero_almacen;
}

?>

</body>
</html>