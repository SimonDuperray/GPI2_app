<?php
$ADMINID = 10;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">  
        <title> Menu Administrateur </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script type="text/javascript" src="verificationFormulaire.js"></script>
    </head>


    <body>
        
        <?php 

            // Récupération du numéro de l'utilisateur
            session_start();
            $numeroUtilisateur = $_SESSION['utilisateur'];

            // Si Administrateur ... 
            if ($numeroUtilisateur == $ADMINID) {

                $mysqli = new mysqli("localhost", "gpi2", "network", "projet");
                if($mysqli->connect_error) {
                    exit('Impossible de se connecter à la BD');
                }
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $mysqli->set_charset("utf8");


                $maRequete = "SELECT * FROM Concours WHERE 1";

                $result = $mysqli->query($maRequete); 

                echo "<ul>";
                while($row = mysqli_fetch_assoc($result)){
                    echo "<li>".$row['numConcours']."-".$row['description']."</li>";
                }
                echo "</ul>";
    
                $mysqli->close();
                
                echo "<a href=\"menuAdministrateur.php\"> Back </a> <br>";
        
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
