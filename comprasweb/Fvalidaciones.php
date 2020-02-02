
<?php

function validacionExistenciaCampo($db,$Nombre,$tabla,$id){
    $existe=false;
    $sql = "SELECT * FROM $tabla where NOMBRE='$Nombre' or ID_CATEGORIA='$id'";
    
if ($result=mysqli_query($db,$sql)){ 
    $rowcount=mysqli_num_rows($result);
    echo $rowcount;
    if($rowcount!=0){
        $existe=true; 
    }
}
return $existe;


}
function validarnif($dni){
    $comprabar=false;
    $cadena="qwertyuiopasdfghjklñzxcvbnm";
    $cadena=strtoupper($cadena);
    $ultimoCaracter=substr($dni,-1,1);
    $ultimoCaracter=strtoupper($ultimoCaracter);
    $numeros=substr($dni,0,-1);
   
    if(empty($dni)||!is_numeric($numeros))
    echo "nif tiene un caracte que no es numero o esta vacio";
    elseif(!strpos($cadena,$ultimoCaracter))
       echo " nif el ultimo caracter no es una letra";
    else
        $comprabar=true;
  


 return $comprabar;
    

}
function validarlocalidad($db,$localiad){//buscar y devuelve si existe la localidad 
    $localidades=obteneLocalidad($db);
    
    $existe=in_array($localiad,$localidades);
  
 
    return $existe;

}
/*
function obteneconsultaunCampo($db,$campo,$tabla) {
	$array_consulta = array();
	
	$sql = "SELECT $campo  FROM $tabla";
	
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$array_consulta[] = $row['NUM_ALMACEN'];
		}
	}
	return $array_consulta;
}*/
function obteneLocalidad($db) {
	$LOCALIDADES = array();
	
	$sql = "SELECT LOCALIDAD FROM ALMACEN";
	
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$LOCALIDADES[] = $row['LOCALIDAD'];
		}
	}
	return $LOCALIDADES;
}

?>
