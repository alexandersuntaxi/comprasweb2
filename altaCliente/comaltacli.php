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
include "Fvalidaciones.php";



/* Se muestra el formulario la primera vez */
if (!isset($_POST) || empty($_POST)) { 

	
	
	
    /* Se inicializa la lista valores*/
	echo '<form action="" method="post">';
?>
<div class="container ">
<!--Aplicacion-->
<div class="card border-success mb-3" style="max-width: 30rem;">
<div class="card-header"> Datos cliente</div>
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
        <div class="form-group">
        CP <input type="text" name="CP" placeholder="nombre" class="form-control">
        </div>
        <div class="form-group">
        DIRECCION <input type="text" name="DIRECCION" placeholder="nombre" class="form-control">
        </div>
		<div class="form-group">
       CIUDAD  <input type="text" name="CIUDAD" placeholder="precio" class="form-control">
        </div>
	

<?php
	echo '<div><input type="submit" value="Alta Producto"></div>
	</form>';
} else { 


    $NIF=$_POST['NIF'];
    $nombre=$_POST['nombre'];
    $APELLIDO=$_POST['APELLIDO'];
    $CP=$_POST['CP'];
    $DIRECCION=$_POST['DIRECCION'];
    $CIUDAD=$_POST['CIUDAD'];
    $sql = "INSERT INTO CLIENTE (NIF,NOMBRE,APELLIDO,CP,DIRECCION,CIUDAD) VALUES ('$NIF', '$nombre', '$APELLIDO', '$CP', '$DIRECCION','$CIUDAD');";

 /*Alta  de  Clientes(comaltacli.php):  dar  de  alta  un  cliente. 
Se  validará  que  el  campo  NIF  no está vacío  y  que se  
compone  de  8  dígitos más  una  letra.  Además,  
se controlará mediante  el correspondiente
mensaje de error que no se dan de alta dos clientes con el mismo NIF.*/  
/*NIF VACIO O COMPROBAR SI  */
if(validarnif($NIF)){
    altaCliente($db,$sql);
}



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

</body>
</html>