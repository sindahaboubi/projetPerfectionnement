<?php
    include "connexion.php";
    $sujet = $_POST['sujet'];
    $dateDeb =$_POST['dateDeb'];
    $dateFin = $_POST['dateFin'];
    $siPaye = $_POST['siPaye'];
    $montant = $_POST['montant'];
    $nbPlaces = $_POST['nbPlaces'];
    $departement = $_POST['departement'];
    $idtype = $_POST['idtype'];
    $idAdmin = $_POST['idAdmin'];
    
    $sql="INSERT INTO stage ( sujet, dateDeb, dateFin, siPaye, montant, nbPlaces,
    departement, idtype, idAdmin) 
    VALUES ('$sujet', '$dateDeb', '$dateFin', '$siPaye', $montant, $nbPlaces,
    '$departement', $idtype, $idAdmin)";

    $res = $cnx->exec($sql);
    if($res != 0){
        $response['data'] = "Insertion avec succees";
    }else{
        $response['data'] = "fail";
    }

    header('Content-Type: application/json;charset=UTF-8');
    echo json_encode($response);