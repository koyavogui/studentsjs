<?php
    /**
     *  Fonction de verification si l'information saisie se trouve dans la base de Données
     *  1. liste des parametres(nomdelatable, nom champ mail, nom champ contact, nom champ mot de passe, username, motdepasse saisie, champ à retourner ); 
     */

    function userConnect ($pdo, $table, $premierchamp, $secondchamp, $troisiemechamp, $username, $password, $return){
        $email = strstr($username, '@');
        $interrupteur = strstr($email, '.');

        if($interrupteur == false){
            // le parametre username est un contact
            $check = $pdo->prepare("SELECT * FROM ".$table." WHERE ".$premierchamp."=:contact LIMIT 1");
            $check->bindParam(':contact', $username );
        }else{
            // le parametre username est un email
            $check = $pdo->prepare("SELECT * FROM ".$table." WHERE ".$secondchamp."=:email LIMIT 1");
            $check->bindParam(':email', $username );
        }
        $check->execute(); 
        if($check->rowCount() == 1){
            $userActif= $check->fetch(PDO::FETCH_OBJ);
                if(password_verify($password, $userActif->$troisiemechamp)){   
                    return $userActif->$return;
                }else{

                    return 'password';
                }
        }else{

            return 0;
        }
    }

    /**
     * fonction de vérification si un cours n'est pas encore terminer
     */
    function checkstatutCours($pdo, $idprof){
        $sql = "SELECT  statusduCours FROM cours WHERE idProfesseur=:prof AND dateCours=:date AND heuredebutCours < :time ORDER BY dateCours DESC Limit 1";
        $data = [
            'prof' =>$idprof,
            'date' =>date("Y-m-d"),
            'time' =>date("H:i:s")
        ];
        $result = $pdo->prepare($sql);
        $result->execute($data);
        if ($result->rowcount() == 1) {
            $result =$result->fetch(PDO::FETCH_OBJ);
            return  $result->statusduCours;
        }else{
            $veille = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-1,date("Y")));
            $sql = "SELECT  idCours, statusduCours FROM cours WHERE idProfesseur=:prof AND dateCours=:date ORDER BY dateCours DESC Limit 1";
            $data = [
                'prof' =>$idprof,
                'date' =>$veille
            ];
            $result = $pdo->prepare($sql);
            $result->execute($data);
            if($result->rowcount() == 1){
                $result =$result->fetch(PDO::FETCH_OBJ);
                if($result->statusduCours == 0){
                    $sql = "UPDATE cours SET statusducours = 1, heuredefinCours=:heure WHERE idCours=:id ";
                    $heure ="23:59:59" ;
                    $data = [
                        'heure' => $heure,
                        'id'    =>$result->idCours
                    ];
                    $result = $pdo->prepare($sql);
                    $result->execute($data);
                    if($result){
                        return 1; 
                    }
                }
            }
        }
      }
    /**
     * fonction de vérification que le mail ou le contact n'existe pas déjà dans la base de données
     */

    function checkmailorcontact($pdo, $table, $colonnetable, $valeuruser){
            $check = $pdo->prepare("SELECT * FROM ".$table." WHERE ".$colonnetable."=:contact LIMIT 1");
            $check->bindParam(':contact', $valeuruser );
        $check->execute(); 
        if($check->rowCount() == 1){
             return 1;
        }else{
            return 0;
        }
    }
    function dateToFrench($date, $format) 
    {
        $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $french_days = array('Mundi', 'Mardi', 'Mercredi', 'Jeudi', 'vendredi', 'Samedi', 'Dimanche');
        $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $french_months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
        return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
    }
?>