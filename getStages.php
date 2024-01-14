<?php 
require_once "connexion.php";
$sql="SELECT * from stage";
$req=$cnx->query($sql);
if($req->rowCount()> 0){
    $i=0;
    while($tab=$req->fetch(PDO::FETCH_ASSOC))
    {
        $response['data'][$i]=$tab;
        $i=$i+1;
    }
}
else {
    $response['data']=null;
}
header('Content-Type: application/json;charset=UTF-8');
echo json_encode($response);
?>