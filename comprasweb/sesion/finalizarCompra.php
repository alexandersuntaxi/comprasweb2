
<?php
session_start();
?>
<html>
<head>
<title>Pagina Login</title>
</head>
<body>
<?php
include "conexion.php";
if(isset($_SESSION['carrito1'])){
    
    $fecha= date_create('now');

$carrito=$_SESSION['carrito1'];
for ($i=0; $i <count($carrito) ; $i++) { 
    $producto=$carrito[$i];
  echo $codigo=$producto[0];

  echo $cantidad=$producto[1];
var_dump($producto);
    date_modify($fecha, '+1 seconds');
    date_modify($fecha, '+1 day');
    $hoy=date_format($fecha, 'Y-m-d h:i:s');

  
 

  $sql = "INSERT INTO COMPRA (NIF,ID_PRODUCTO,FECHA_COMPRA,UNIDADES) VALUES ('12345678B','$codigo','$hoy','$cantidad');";
  sql_f($db,$sql);

}/*
echo "<br>";

*/
}



?>
<?php
function sql_f($db,$sql){
        
if (mysqli_query($db, $sql)) {

    echo "New record created successfully";

} else {

    echo "Error: " . $sql . "<br>" . mysqli_error($db);

}

}

?>
</body>
</html>