<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">  
        <title>Admin Panel</title>
        <link rel="stylesheet" href="style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    <body>
        <?php 
            $ADMINID = 10;

            session_start();
            $numeroUtilisateur = $_SESSION['utilisateur'];

            if ($numeroUtilisateur == $ADMINID) {
        ?>
            <div class="container" id='form-container'>
                <form action="retourAjoutUtilisateur.php" method="POST">
                    <h3 id='welcome'>Add User</h3>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
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
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Add User" />
                </form>
                <button class='btn btn-primary pd'>
                    <a class='link' href="menuAdministrateur.php">
                        Go Admin Panel
                    </a>
                </button>
            </div>
        <?php
            } else {
                echo "
                <div class='container container-div'>
                    <p id='msg-err'>You're not admin</p>
                    <div class='btn-container'>
                        <button class='btn btn-primary'>
                            <a class='link' href=\"index.php\">Log In</a>
                        </button>
                    </div>
                </div>
                ";
            }
        ?>
        <script type="text/javascript" src="verificationFormulaire.js"></script>
    </body>
</html>
