<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web compras</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
<h1>ALTA CATEGORÍAS -alexander_suntaxi_acosta</h1>
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
<div class="card-header">Datos Categoría</div>
<div class="card-body">
		<div class="form-group">
        ID CATEGORIA <input type="text" name="idcategoria" placeholder="idcategoria" class="form-control">
        </div>
		<div class="form-group">
        NOMBRE CATEGORIA <input type="text" name="nombre" placeholder="nombre" class="form-control">
        </div>

		</BR>
<?php
	echo '<div><input type="submit" value="Alta Categoría"></div>
	</form>';
} else { 

    $id=$_POST["idcategoria"];
    $nombre=$_POST["nombre"];


    $sql = "INSERT INTO CATEGORIA (ID_CATEGORIA, NOMBRE) VALUES ('$id', '$nombre');";

    if(empty($id)||empty($nombre)){
        echo "uno de los campos esta vacio";
    }else if(!validacionExistenciaCampo($db,$nombre,'CATEGORIA',$id)){
        echo "campo no existe";
        ejecutarSql($db, $sql);
    }else{
        echo "los valores ya existen en la tabla";
    }
   
    mysqli_close($db);
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


?>



</body>

</html>