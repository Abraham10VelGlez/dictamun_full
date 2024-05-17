<?php 

//echo "holas";



try {
    $mbd = new PDO('mysql:host=10.10.68.31;dbname=ventanillaunik', 'root', 'yzR3qruwNnDFglDX');
    //$mbd = null;
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

$user_vua=1;



$sentencia = $mbd->prepare("SELECT * FROM tramites WHERE id_usuario=?");
if ($sentencia->execute(array(1))) {
    while ($fila = $sentencia->fetch()) {
        $data[] = $fila;
    }
}else{
    echo "5";
}


//print_r($data);


$dd = date("Y-m-d");

// Prepare
$sentencia = $mbd->prepare("INSERT INTO tramites  (id_usuario, id_tramite, tipo_tramite, fecha_tramite, estatus, obs, F_EstatusServ) VALUES (?,?,?,?,?,?,?)");
// Bind
$a=340;
$b=1;
//tipo de tramite para el dictamun es 2
$c=2;
//fecha
$d=$dd;
// los estatus pueden ir del 1 al 13
/*
CASE WHEN etapa =1 THEN 'REGISTRO DE DICTAMEN'
WHEN etapa =2 THEN 'PENDIENTE DE CONTRIBUYENTE vobo'
WHEN etapa =3 THEN 'FALTA ASIGNAR A REVISOR'
WHEN etapa =4 THEN 'ASIGNADO A REVISOR'
WHEN etapa =5 THEN 'PRE VALIDADO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO'
WHEN etapa =11 THEN 'PRE RECHAZO' 
WHEN etapa =12 THEN 'NO AUTORIZADO' 
WHEN etapa =13 THEN 'RECHAZADO'
END) as etapa_de_dict
*/

$e=1;
$f="";
//fecha
$g=$dd;

$sentencia->bindParam(1, $a);
$sentencia->bindParam(2, $b);
$sentencia->bindParam(3, $c);
$sentencia->bindParam(4, $d);
$sentencia->bindParam(5, $e);
$sentencia->bindParam(6, $f);
$sentencia->bindParam(7, $g);
// Excecute
$sentencia->execute();



/*
 * 
 * 
 INSERT INTO `tramites` (`id`, `id_usuario`, `id_tramite`, `tipo_tramite`, `fecha_tramite`, `estatus`, `obs`, `F_EstatusServ`) VALUES (NULL, '1', '1', '1', now(), '1', '11111', now())
 * 
 * */

?>