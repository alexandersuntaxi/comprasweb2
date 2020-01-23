
<?php

function validarnif($dni){
    $comprabar=false;
    $cadena="qwertyuiopasdfghjklñzxcvbnm";
    $cadena=strtoupper($cadena);
    $ultimoCaracter=substr($dni,-1,1);
    $ultimoCaracter=strtoupper($ultimoCaracter);
    $numeros=substr($dni,0,-1);
    if(empty($dni)||!is_numeric($numeros))
    echo " tiene un caracte que no es numero o esta vacio";
    elseif(!strpos($cadena,$ultimoCaracter))
       echo "el ultimo caracter no es una letra";
    else
        $comprabar=true;
  


 return $comprabar;
    

}
function validarlocalidad($db,$localiad){//buscar y devuelve si existe la localidad 
    $localidades=obteneLocalidad($db);
    
    $existe=in_array($localiad,$localidades);
  
 
    return $existe;

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

function obteneLocalidad($db) {
	$LOCALIDADES = array();
	
	$sql = "SELECT LOCALIDAD  FROM AlMACEN";
	
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$LOCALIDADES[] = $row['LOCALIDAD'];
		}
	}
	return $LOCALIDADES;
}

?>