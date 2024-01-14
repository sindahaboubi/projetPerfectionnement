<?php
    include "connexion.php";
    $etablissement = $_POST['etablissement'];
    $demandefac =$_FILES['demandefac'];
    $idStagiaire = $_POST['idStagiaire'];
    $idtype = $_POST['idtype'];
    $dateDeb = $_POST['dateDeb'];
    $dateFin = $_POST['dateFin'];
    $niveauEtude = $_POST['niveauEtude'];
    $cv =$_FILES['cv'];

        $sql="SELECT * FROM demande";
        $req=$cnx->query($sql);
        $test=true;
        while($tab=$req->fetch(PDO::FETCH_ASSOC))
        {
            if($tab['dateDeb']<=$dateDeb && $tab['dateFin']>=$dateFin && $tab['idStagiaire']==$idStagiaire){
                $test=false;
            }
        }

        $reqInscri="";
        if($test){
            $target_dir = "projetStageFront/src/assets/"; //image upload folder name
            $imageFileType=".".strtolower(substr(strrchr($demandefac["name"],"."),1));
            $target_file = $target_dir .uniqid().$imageFileType;
                //moving multiple images inside folder
                move_uploaded_file($demandefac["tmp_name"], $target_file);
                $f= substr($target_file,strlen($target_dir),strlen($target_file));
        
            $target_dir = "projetStageFront/src/assets/"; //image upload folder name
            $imageFileType=".".strtolower(substr(strrchr($cv["name"],"."),1));
            $target_file = $target_dir .uniqid().$imageFileType;
                //moving multiple images inside folder
                move_uploaded_file($cv["tmp_name"], $target_file);
                $f1= substr($target_file,strlen($target_dir),strlen($target_file));
    
            $reqInscri="INSERT INTO demande ( etablissement, demandefac, idStagiaire, dateCreation, idtype, dateDeb,
            dateFin, niveauEtude, cv) 
            VALUES ('$etablissement', '$f', $idStagiaire,  '".date("Y-m-d")."' , $idtype, '$dateDeb', '$dateFin', 
            '$niveauEtude', '$f1')";
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