<?php
include "connexion.php";
    $image=$_FILES['image'];
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

    $choix =$_POST['choix'];

    $sql="SELECT * FROM stagiaire";
        $req=$cnx->query($sql);
        $test=true;
        while($tab=$req->fetch(PDO::FETCH_ASSOC))
        {
            if($tab['email']==$mail || $tab['username']==$user || $tab['cin']==$cin){
                $test=false;
            }
        }

    $reqInscri="";
        if($test){
        $target_dir = "projetStageFront/src/assets/"; //image upload folder name
        $imageFileType=".".strtolower(substr(strrchr($image["name"],"."),1));
        $target_file = $target_dir .uniqid().$imageFileType;
            //moving multiple images inside folder
            move_uploaded_file($image["tmp_name"], $target_file);
            $f= substr($target_file,strlen($target_dir),strlen($target_file));
            $reqInscri="INSERT into stagiaire(username,email,mdp,nom,prenom,dateNaiss,tel,cin,adresse,genre,photo) 
            values('$user','$mail','$pwd','$nom','$prenom','$date','$tele','$cin','$adr','$genre','$f')";
        }
    
  if($reqInscri!="") 
  { $req=$cnx->exec($reqInscri);
    
    if($req>0){
        $response['data']="success";
    }
    else {
        $response['message']="Fail";
    }
}else
$response['message']="Fail";

    header('Content-Type: application/json;charset=UTF-8');
    echo json_encode($response);
?>