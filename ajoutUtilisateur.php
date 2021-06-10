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
        ?>
            <div class="container">
                <form action="retourAjoutUtilisateur.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <label for="firstname" class="form-label">Firstname</label>
                        <input type="text" class="form-control" id="firstname" name="firstname">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" class="form-control" id="login" name="login">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" />
                </form>
                <button>
                    <a href="menuAdministrateur.php">
                        Back to menu
                    </a>
                </button>
            </div>
                
        <?php
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
