<?php
include "connexion.php";
 
$idAdmin=$_POST['idAdmin'];
$idDemande=$_POST['idDemande'];
$idStage = $_POST['idStage'];
$idEncadrant = $_POST['idEncadrant'];

$sql="insert into ajouts(idAdmin,idDemande,idStage,idEncadrant) values($idAdmin,$idDemande,$idStage,$idEncadrant)";
$res=$cnx->exec($sql);

if($res !=0 ){
    $response['data']="Success";
}
else {
    $response['data']="Fail";
}

header('Content-Type: application/json;charset=UTF-8');
echo json_encode($response);
?>