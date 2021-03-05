<?php
    include "./../includes/db.php";
    $key = $_POST['key'];

    if ($key == 'enregistrement') {
        /**
         *  Redaction de la requette
         *  deplacement de l'avatar vers le dossier adequat
         *  preparation des données pour insertion
         *  execution de l'insertion
         */

        $sql = "INSERT INTO etudiant(nomStudent, prenomStudent, genreStudent, emailStudent, contactStudent, motdepassStudent, imgStudent, create_at) VALUES (:nom, :prenom, :genre, :email, :contact, :motdepasse, :img, :create_at)"; 
        if($_FILES['avatar']['error'] == 0){
            //recuperez l'extension de l'image
            $extension = strtolower(pathinfo(basename($_FILES["avatar"]["name"]),PATHINFO_EXTENSION));
            $vowels = array("/", "'",  '"', ".");
            //generation du nouveau nom de l'image
            $newPhotoName =  stripcslashes($_POST['name'])."".stripcslashes($_POST['firstname'])."".date("YmdHis").".".$extension;
            $newPhotoName = str_replace($vowels, "", $newPhotoName);
            //generation du chemin pour deplacer l'image
            $imagePath = "./../uploaded/".$newPhotoName;
            if(!move_uploaded_file($_FILES["avatar"]["tmp_name"], $imagePath) ){
                //deplacement de l'image
                $newPhotoName ="";
            }
        }else{
            $newPhotoName ="";
        }
        $mpd = $_POST['password'];
             
        $hash = password_hash($mpd , PASSWORD_DEFAULT);
        $data = [
            'nom'       =>$_POST['name'],
            'prenom'    =>$_POST['firstname'],
            'genre'     =>$_POST['genre'],
            'email'     =>$_POST['email'],
            'contact'   =>$_POST['contact'],
            'motdepasse' =>$hash,
            'img'       =>$newPhotoName,
            'create_at'    =>date("Y-m-d H:i:s")
        ];

        if($pdo->prepare($sql)->execute($data)){
            $create = 'success';
        }

        $output=array('insert'=>$create);
        echo json_encode($output);
    }
?>