<?php
$ADMINID = 10;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">  
        <title> Menu Administrateur </title>
    </head>


    <body>
        
        <?php 

            // Récupération du numéro de l'utilisateur
            session_start();
            $numeroUtilisateur = $_SESSION['utilisateur'];

            // Si Administrateur ... 
            if ($numeroUtilisateur == $ADMINID) {




                // Récupération des réponses
                if (isset($_POST['name']) and isset($_POST['firstname']) ) {                    // vérifie que le champ du formulaire est bien rempli
                    $name = htmlspecialchars($_POST['name']);                                 // stocke les réponses, en convertissant les possibles caractères particuliers
                    $firstname = htmlspecialchars($_POST['firstname']);                               
                    $address = htmlspecialchars($_POST['address']);  
                    $login = htmlspecialchars($_POST['login']);  
                    $password = htmlspecialchars($_POST['password']);  

                    



                    // Connexion à la base données 
                    $mysqli = new mysqli("localhost", "gpi2", "network", "projet");
                    if($mysqli->connect_error) {
                        exit('Impossible de se connecter à la BD');
                    }
                    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                    $mysqli->set_charset("utf8");
                    

                    // associe variables ??
                    $name = $mysqli->real_escape_string($name);
                    $firstname = $mysqli->real_escape_string($firstname);
                    $address = $mysqli->real_escape_string($address);
                    $login = $mysqli->real_escape_string($login);
                    $password = $mysqli->real_escape_string($password);

                    $maRequete = "INSERT INTO Utilisateur VALUES (null,'".$name."','".$firstname."', '".$address."','".$login."', PASSWORD('".$password."'));";   // Requête SQL


                
                    // Résultat de la requête
                    $result = $mysqli->query($maRequete);                   // Si requête éxécutée
                    if(!$result) {
                        echo "La requête ne s’est pas exécutée ";
                    } 
                    else {
                        echo "
                        La requête s’est bien exécutée <br>
                        <a href=\"menuAdministrateur.php\"> Page administrateur </a> <br><br>";
                        // $result->free();
                    }
                    $mysqli->close();
                }


            }
            else {
                echo "
                <p> Vous n'êtes pas Administrateur </p> <br>
                <a href=\"index.php\"> Page de connexion </a>
                ";
            }


        ?>

    </body>
</html>
