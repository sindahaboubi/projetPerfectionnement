<?php  
    include "connexion.php";
 
    $id=$_POST['id'];
    $sujet=$_POST['sujet'];
    $dateDeb=$_POST['dateDeb'];
    $dateFin=$_POST['dateFin'];
    $siPaye=$_POST['siPaye'];
    $montant=$_POST['montant'];
    $nbPlaces=$_POST['nbPlaces'];
    $departement=$_POST['departement'];


    $sql="UPDATE stage SET sujet='$sujet', dateDeb='$dateDeb', dateFin='$dateFin', siPaye='$siPaye', 
    montant=$montant, nbPlaces=$nbPlaces, departement='$departement' WHERE id=$id";

    $res = $cnx->exec($sql);
    if($res != 0){
        $response['data'] = "Modification avec succees";
    }else{
        $response['data'] = "Erreur !";
    }

    header('Content-Type: application/json;charset=UTF-8');
    echo json_encode($response);
?>