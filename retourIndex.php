<?php
$ADMINID = 10;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">  
        <title>Page de traitement</title>
    </head>


    <body>
        <!-- <p>Dans le formulaire précédent, vous avez fourni les
        informations suivantes :</p> -->
        
        <?php 

        // Récupération des réponses
        if (isset($_POST['login']) and isset($_POST['password']) ) {
            $login = htmlspecialchars($_POST['login']);
            $pwd = htmlspecialchars($_POST['password']);
        

            // Connexion à la base données 
            $mysqli = new mysqli("localhost", "gpi2", "network", "projet");
            if($mysqli->connect_error) {
                exit('Impossible de se connecter à la BD');
            }
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $mysqli->set_charset("utf8");

            $login = $mysqli->real_escape_string($login);
            $pwd = $mysqli->real_escape_string($pwd);
            $maRequete = "SELECT * FROM Utilisateur WHERE login = '".$login."' AND motDePasse = PASSWORD('".$pwd."');";

            // Résultat de la requête
            $result = $mysqli->query($maRequete);                  
            if(!$result) {
                echo "La requête ne s’est pas exécutée";
            } 
            else {
                echo "La requête s’est bien exécutée";
                $resultat = $result->fetch_assoc(); 

                if ($resultat){
                    echo "<p> Connexion réussie ! </p><br>";

                    // mémoriser une valeur :
                    session_start();
                    $_SESSION['utilisateur'] = $resultat["numUtilisateur"];
                    $_SESSION['login'] = $login;
                    
                    // vérifie si l'utilisateur est Administrateur
                    if($resultat["numUtilisateur"] == $ADMINID) {                                              
                        echo "<a href=\"menuAdministrateur.php\"> Admin panel </a> <br> <br>";
                    }
                    echo "<a href=\"listeConcours.php\"> Liste des concours </a> <br>";
                }       
                else {
                    echo "
                    <p> Failed connection </p><br>
                    <a href=\"index.php\"> Page de connexion </a>
                    ";
                }
                $result->free();
            }
            $mysqli->close();
            
        
        }
        else { 
            echo "
            <p> Unknown user </p><br>
            <a href=\"index.php\"> Page de connexion </a>
            ";
        }

        ?>


    </body>
</html>



