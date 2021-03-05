<?php
    include "./../../includes/db.php";
    session_start();
    $key = $_POST['key'];

    if ($key == 'demarrer') {
        $sql="INSERT INTO cours(idProfesseur, dateCours, heuredebutCours) VALUES (:prof,:date, :heuredebut)";
        
        $data= [
            'prof' => $_SESSION['idUser'],
            'date' => date("Y-m-d"),
            'heuredebut' => date("H:i:s")
        ];
        if ($pdo->prepare($sql)->execute($data)) {
            $output=array('result'=>'success');
            echo json_encode($output);
        }
    } else {
        $sql = "UPDATE cours SET statusducours = 1, heuredefinCours=:heure WHERE idProfesseur=:prof AND  dateCours =:date ";
        
        $data= [
            'prof'  => $_SESSION['idUser'],
            'date'  => date("Y-m-d"),
            'heure' => date(" H:i:s")
        ];
        if ($pdo->prepare($sql)->execute($data)) {
            $output=array('result'=>'success');
            echo json_encode($output);
        }
    }
    
?>