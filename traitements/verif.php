<?php
    include "./../includes/db.php";
    include "./../includes/function.php";
    $key = $_POST['key'];
    $saisie = $_POST['saisie'];
    if ($key == "email") {
        $result = checkmailorcontact($pdo, 'etudiant', 'emailStudent',  $saisie);
        echo json_encode(array('result'=>$result));
    } else {
        $result = checkmailorcontact($pdo, 'etudiant', 'contactStudent',  $saisie);
        echo json_encode(array('result'=>$result));
    }
    
?>