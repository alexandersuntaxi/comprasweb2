
<?php
session_start();
?>
<html>
<head>
<title>Pagina Login</title>
</head>
<body>
<?php
if(isset($_SESSION['nombre'])){
echo "<p>Has iniciado sesion: " . $_SESSION['nombre'] . "";
echo "<p><a href='pagina3.php'>Cerrar Sesion</a></p>";
}else {
?>
<form action="menu.php" method="POST">
<h1> Login </h1>
<p>Usuario:<input type="text" placeholder="Introduce usuario" name="nombre" required/></p><br />
<p>clave:<input type="text" placeholder="Introduce clave" name="clave" required/></p><br />

<input type="submit" value="Login" />
</form>
<?php
}
?>
</body>
</html>