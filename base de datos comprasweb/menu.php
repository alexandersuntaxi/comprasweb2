<?php
session_start();
?>
<html>
<head>
<title>Pagina 2</title>
</head>
<body>
<?php
if(isset($_POST['nombre']) && isset($_POST['clave'])){ 
$nombre=$_POST['nombre'];
$clave=$_POST['clave'];

$_SESSION['nombre'] = $_POST['nombre'];
$_SESSION['clave'] = $_POST['clave'];
echo "Bienvenido! Has iniciado sesion: ".$_POST['nombre'];
 menu();

}else{
if(isset($_SESSION['nombre'])){
echo "Has iniciado Sesion: ".$_SESSION['nombre'];
menu();
}else{
echo "Acceso Restringido debes hacer Login con tu usuario";
}
}
?>
<br/><a href="pagina1.php">Volver a pagina Login</a>
</body>
</html>

<?php
function menu(){

   echo " <br/><a href='comprar.php'>ir a la tienda</a>";

}
?>
