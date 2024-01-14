<?php  
    include "connexion.php";
 
    $id=$_POST['id'];
    $email=$_POST['email'];
    $mdp=$_POST['mdp'];
    $username=$_POST['username'];
    $adresse=$_POST['adresse'];
    $tel=$_POST['tel'];

    $sql="UPDATE encadrant SET email='$email', mdp='$mdp', username='$username', adresse='$adresse', 
    tel='$tel' WHERE id=$id";

    $res = $cnx->exec($sql);
    if($res != 0){
        $response['data'] = "Modification avec succees";
    }else{
        $response['data'] = "Erreur !";
    }

    header('Content-Type: application/json;charset=UTF-8');
    echo json_encode($response);
?>