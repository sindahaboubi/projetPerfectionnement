<?php  
    include "connexion.php";

    $id = $_POST['id'];

    $sql = "DELETE FROM encadrant WHERE id = $id";

    $res = $cnx->exec($sql);
    if($res != 0){
        $response['data'] = "Suppression avec succees";
    }else{
        $response['data'] = "Fail";
    }

    header('Content-Type: application/json;charset=UTF-8');
    echo json_encode($response);
?>