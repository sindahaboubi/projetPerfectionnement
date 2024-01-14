<?php  
    include "connexion.php";
 
    $id=$_POST['id'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $mdp=$_POST['mdp'];
    $genre=$_POST['genre'];
    $username=$_POST['username'];
    $adresse=$_POST['adresse'];
    $tel=$_POST['tel'];
    $cin=$_POST['cin'];

    $sql="UPDATE stagiaire SET nom='$nom', prenom='$prenom', email='$email', mdp='$mdp', genre='$genre',
    username='$username', adresse='$adresse', tel='$tel', cin='$cin' WHERE id=$id";

    $res = $cnx->exec($sql);
    if($res != 0){
        $response['data'] = "Modification avec succees";
    }else{
        $response['data'] = "Erreur !";
    }

    header('Content-Type: application/json;charset=UTF-8');
    echo json_encode($response);
?>