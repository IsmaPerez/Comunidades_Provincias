<?php
$mysql= new mysqli("localhost","geografia","geografia","geografia");
$result=$mysql->query("SELECT * FROM provincias WHERE id_comunidad={$_GET["id_comunidad"]}");
$fila=$result->fetch_assoc();
header('Content-Type:application/javascript;charset=UTF-8;');
echo '{';
echo '"provincias":[';
while($fila){
    echo '{';
    echo '"n_provincia":'.$fila["n_provincia"].',';
    echo '"nombre":"'.$fila["nombre"].'"}';
    $fila=$result->fetch_assoc();
    if ($fila){
        echo ',';
    }
}
echo ']';
echo '}';
?>