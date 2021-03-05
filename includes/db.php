<?php

 
    $db_host="localhost"; // localhost server
    $db_user="root"; //nom de l'utilisateur de la base de donnée
    $db_password=""; //mot de passe utilisateur
    $db_name="bd_attendance"; //nom de la base de donnée
    $charset = 'utf8mb4'; //encodage caractère

    try
    {
        $GLOBALS["pdo"] = new PDO("mysql:host={$db_host};dbname={$db_name};charset=$charset",$db_user,$db_password);
        // var_dump($pdo);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //retourner les resultats en objet
        // $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }
    catch (PDOEXCEPTION $e)
    {
        $e->getMessage();
        echo $e;
    }
    date_default_timezone_set('Africa/Abidjan');
?>