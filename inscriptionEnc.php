<?php
include "connexion.php";
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $date=$_POST['date'];
    $genre=$_POST['genre'];
    $mail=$_POST['mail'];
    $pwd =$_POST['pwd'];
    $adr=$_POST['adr'];
    $cin=$_POST['cin'];
    $tele=$_POST['tele'];
    $user=$_POST['user'];
    $spec=$_POST['spec'];
    $iddirection = $_POST['iddirection'];

    $choix =$_POST['choix'];

    $sql="SELECT * FROM encadrant";
        $req=$cnx->query($sql);
        $test=true;
        while($tab=$req->fetch(PDO::FETCH_ASSOC))
        {
            if($tab['email']==$mail || $tab['username']==$user || $tab['cin']==$cin || $tab['tel']==$tele){
                $test=false;
            }
        }

    $reqInscri="";
        if($test){
    $reqInscri="INSERT into encadrant(username,email,mdp,nom,prenom,dateNaiss,tel,cin,adresse,genre,specialite,iddirection) 
    values('$user','$mail','$pwd','$nom','$prenom','$date','$tele','$cin','$adr','$genre','$spec',$iddirection)";
        }
    
  if($reqInscri!="") 
  { $req=$cnx->exec($reqInscri);
    
    if($req>0){
        $response['data']="success";
    }
    else {
        $response['data']="Fail";
    }
}else
$response['data']="Fail";

    header('Content-Type: application/json;charset=UTF-8');
    echo json_encode($response);
?>