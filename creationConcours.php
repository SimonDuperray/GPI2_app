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


                $maRequete = "SELECT * FROM Utilisateur WHERE numUtilisateur != $ADMINID";

                $result = $mysqli->query($maRequete); 

                echo "
                <div class='container'>
                    <form action='retourCreationConcours.php' method='POST'>
                        <div class='mb-3'>
                            <label for='description'>Description</label>
                            <input type='text' class='form-control' id='description' name='description'>
                        </div>
                        <div class='mb-3'>
                            <label for='date_debut'>Date début</label>
                            <input type='date' class='form-control' id='date_debut' name='date_debut'>
                        </div>
                        <div class='mb-3'>
                            <label for='date_fin'>Date fin</label>
                            <input type='date' class='form-control' id='date_fin' name='date_fin'>
                        </div>
                ";

                echo "
                    <div class='mb-3'>
                        <label for='president'>Président</label>
                        <select name='president' id='president'>
                ";
                
                while($row = mysqli_fetch_assoc($result)){
                    echo "<option value='".$row['numUtilisateur']."'>".$row['nom']."</option>";
                }
                echo "
                    </select></div>
                    <input type='submit' class='btn btn-primary' name='submit'>
                    </form></div>
                ";
    
                $mysqli->close();
                
                echo "<a href=\"menuAdministrateur.php\"> Annuler </a> <br>";
        
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
