<?php
$mysql= new mysqli("localhost","geografia","geografia","geografia");
$result=$mysql->query("SELECT * FROM comunidades ORDER BY nombre");
$fila=$result->fetch_assoc();
header('Content-Type:application/javascript;charset=UTF-8;');
echo '{';
echo '"comunidades":[';
while($fila){
    echo '{';
    echo '"id_comunidad":'.$fila["id_comunidad"].',';
    echo '"nombre":"'.$fila["nombre"].'"}';
    $fila=$result->fetch_assoc();
    if ($fila){
        echo ',';
    }
}
echo ']';
echo '}';
?>