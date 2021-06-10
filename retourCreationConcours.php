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
                if (isset($_POST['description'])) {                    // vérifie que le champ du formulaire est bien rempli
                    $description = htmlspecialchars($_POST['description']);                                 // stocke les réponses, en convertissant les possibles caractères particuliers
                    $date_debut = htmlspecialchars($_POST['date_debut']);                               
                    $date_fin = htmlspecialchars($_POST['date_fin']);  
                    $president = htmlspecialchars($_POST['president']);  

                    



                    // Connexion à la base données 
                    $mysqli = new mysqli("localhost", "gpi2", "network", "projet");
                    if($mysqli->connect_error) {
                        exit('Impossible de se connecter à la BD');
                    }
                    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                    $mysqli->set_charset("utf8");
                    

                    // associe variables ??
                    $description = $mysqli->real_escape_string($description);
                    $date_debut = $mysqli->real_escape_string($date_debut);
                    $date_fin = $mysqli->real_escape_string($date_fin);
                    $president = $mysqli->real_escape_string($president);
                    $state = $mysqli->real_escape_string('en cours');

                    $maRequete = "INSERT INTO Concours VALUES (null, '".$president."', '".$state."', '".$description."','".$date_debut."', '".$date_fin."');";


                
                    $result = $mysqli->query($maRequete);            
                    if(!$result) {
                        echo "La requête ne s’est pas exécutée ";
                    } 
                    else {
                        echo "
                        La requête s’est bien exécutée <br><br>
                        <a href=\"menuAdministrateur.php\"> Page administrateur </a> <br>";
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
