<?php
session_start();
    include "./../../includes/db.php";
    include "./../../includes/function.php";
     
    $result = userConnect($pdo,'etudiant', 'contactStudent', 'emailStudent', 'motdepassStudent', $_POST['emailLogin'], $_POST['password'], 'idStudent' );
    if ($result == 0 || $result == "password") {
        $answer = "S-echec";
        $output = array('login'=>$answer);
    }else{
        $_SESSION['idUser']     =  $result;
        $answer                 = "S-success";
        $output                 = array('login'=>$answer);
    }
    echo json_encode($output);
?>