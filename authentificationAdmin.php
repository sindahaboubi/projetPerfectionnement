<?php 
include "connexion.php";
    $username=$_POST['username'];
   
    $password=$_POST['pwd'];

    $loginsql="SELECT * FROM admin where username='$username' and mdp='$password'";
    $req=$cnx->query($loginsql);
    $tab = $req->fetch(PDO::FETCH_ASSOC);
    if(count($tab)> 0){
        $response['data']=$tab;
    }
    else $response['data']=null;
    header('Content-Type: application/json;charset=UTF-8');
    echo json_encode($response);
?>