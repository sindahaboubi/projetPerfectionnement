<?php 
require_once "connexion.php";
$id=$_POST['id'];
$sql="SELECT * from demande where id=$id";
$req=$cnx->query($sql);
if($req->rowCount()> 0){
    while($tab=$req->fetch(PDO::FETCH_ASSOC))
    {
        $response['data']=$tab;
    }
}
else {
    $response['data']="Demande not found";
}
header('Content-Type: application/json;charset=UTF-8');
echo json_encode($response);
?>