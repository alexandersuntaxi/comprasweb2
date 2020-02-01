
<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web compras</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
<h1>Registro_para_login - alexander_suntaxi_acosta</h1>
<?php

include "conexion.php";


/* Se muestra el formulario la primera vez */
if (!isset($_POST) || empty($_POST)) { 

	
    $nombres=obtenernombre($db);
	$apellido=obtenerApellido($db);
    /* Se inicializa la lista valores*/
	echo '<form action="" method="post">';
?>
<div class="container ">
<!--Aplicacion-->
<div class="card border-success mb-3" style="max-width: 30rem;">
<div class="card-header">Datos Producto</div>
<div class="card-body">
	
		<div class="form-group">
          NIF  <input type="text" name="NIF" placeholder="idproducto" class="form-control">
        </div>
		<div class="form-group">
        NOMBRE <input type="text" name="nombre" placeholder="nombre" class="form-control">
        </div>
        <div class="form-group">
        APELLIDO <input type="text" name="APELLIDO" placeholder="nombre" class="form-control">
        </div>
	</BR>
<?php
	echo '<div><input type="submit" value="login"></div>
	</form>';
} else { 
	$NIF=$_POST['NIF'];
    $nombre=$_POST['nombre'];
   
	echo "<h1> te has dado de alta</h1>";
	$CLAVE=strrev($_POST['APELLIDO']);

	$sql = "INSERT INTO LOGIN (NIF,NOMBRE,CLAVE) VALUES ('$NIF','$nombre', '$CLAVE');";

	altaCliente($db,$sql);

echo "<a href='login.php'>Ir a login 2</a>";
	

	
	//AÑADO EL VALOR
		
  



    null;
	
}
?>

<?php

function altaCliente($db,$sql){

    


    echo "<br>";
    
    if (mysqli_query($db, $sql)) {
    
        echo "New record created successfully";
    
    } else {
    
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    
    }
}

?>