<?php
    try{
    $cnx=new PDO('mysql:host=localhost;port=3306;dbname=projetstage;','root','');
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
        echo "N° ". $e->getCode();
    }
?>