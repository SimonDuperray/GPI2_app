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
                echo "
                <button> <a href=\"ajoutUtilisateur.php\"> Ajouter un utilisateur </a> <br> </button>
                <button> <a href=\"creationConcours.php\"> Créer un concours </a> <br> </button>
                ";
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



