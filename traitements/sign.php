<?php
/**
 * processuce de signature
 * 1. verifier s'il y a un cours qui est en cours
 * 2. si oui veérifier si le mail et le mot de pass exist
 * 3.verifier s'il a déjà signer dans la base de donné ou pas
 * 3. si non, le faire signer 
 */
    include "./../includes/db.php";
    include "./../includes/function.php";
        $sql = "SELECT  idCours, statusduCours FROM cours WHERE dateCours=:date AND heuredebutCours < :time ORDER BY dateCours DESC Limit 1";
        $data = [
            'date' =>date("Y-m-d"),
            'time' =>date("H:i:s")
        ];
        $result = $pdo->prepare($sql);
        $result->execute($data);
        //verification s'il y a cours ou pas
        if ($result->rowCount() == 1) {
            $result =$result->fetch(PDO::FETCH_OBJ);    
            if ($result->statusduCours == 1) {
                echo json_encode(array('result'=>'endCours'));
            }else{
                //verification de l'existant de l'utilisateur
                $email = strstr($_POST['username'], '@');
                if($email){
                    $check = checkmailorcontact($pdo, 'etudiant', 'emailStudent',$_POST['username']);
                }else{
                    $chek = checkmailorcontact($pdo, 'etudiant', 'contactStudent', $_POST['username']);
                }
                 
                if($check == 1){
                    $id = userConnect ($pdo, 'etudiant',  'contactStudent','emailStudent', 'motdepassStudent', $_POST['username'], $_POST['passwordSign'], 'idStudent');
                    if ($id == 'password') {
                        echo json_encode(array('result'=>'passwordIncorrect'));
                    }else {
                        // Insertion maintenant dans la table participer
                        $sql = "SELECT create_at  FROM participer WHERE idcours=:idcours AND idStudent=:idstudent";
                        $data = [
                            'idcours'   =>  $result->idCours,
                            'idstudent' =>  $id
                        ];
                        $sign = $pdo->prepare($sql);
                        $sign->execute($data);
                        if ($sign->rowCount() == 1) {
                            # code...
                            echo json_encode(array('result'=>'Signof'));
                        }else {
                            $sql ="INSERT INTO participer(idcours, idStudent, statutParticiper) VALUES (:idcours, :idstudent,1)";
                            $data = [
                                'idcours'   =>  $result->idCours,
                                'idstudent' =>  $id
                            ];
                            $sign = $pdo->prepare($sql)->execute($data);
                            if ($sign) {
                                echo json_encode(array('result'=>'correctSign'));
                            }
                        }
                    }
                }else{
                    echo json_encode(array('result'=>'usernameIncorrect'));
                }
            }
        }else {
            echo json_encode(array('result'=>'noCours')); 
        }
?>