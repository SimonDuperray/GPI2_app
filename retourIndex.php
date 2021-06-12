<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Treatment page</title>
    </head>
    <body>
        <?php
        $ADMINID = 10;

        if (isset($_POST['login']) and isset($_POST['password']) ) {
            $login = htmlspecialchars($_POST['login']);
            $pwd = htmlspecialchars($_POST['password']);
        
            $mysqli = new mysqli("localhost", "gpi2", "network", "projet");
            if($mysqli->connect_error) {
                exit('DDB connection error');
            }
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $mysqli->set_charset("utf8");

            $login = $mysqli->real_escape_string($login);
            $pwd = $mysqli->real_escape_string($pwd);
            $request = "SELECT * FROM Utilisateur WHERE login = '".$login."' AND motDePasse = PASSWORD('".$pwd."');";

            $result = $mysqli->query($request);                  
            if(!$result) {
                echo "Request error";
            } else {
                $resultat = $result->fetch_assoc(); 
                if ($resultat){
                    session_start();
                    $_SESSION['utilisateur'] = $resultat["numUtilisateur"];
                    $_SESSION['login'] = $login;

                    echo "
                        <div class='container container-div'>
                            <h3 id='welcome'>Welcome ".$resultat['prenom']." !</h3>
                            <div class='btn-container'>
                    ";
                    
                    if($resultat["numUtilisateur"] == $ADMINID) {                                              
                        echo "
                            <button class='btn btn-danger'>
                                <a class='link' href='menuAdministrateur.php'>Admin panel</a>
                            </button>
                        ";
                    }
                    echo "
                        <button class=' btn btn-primary'>
                            <a class='link' href='listeConcours.php'>See Drawing Competition List</a>
                        </button>
                        <button class='btn btn-danger'>
                            <a class='link' href='logout.php'>Log out</a>
                        </button>
                        </div></div>
                    ";
                } else {
                    echo "
                        <div class='container container-div'>
                            <p id='msg-err'>Failed connection</p>
                            <div class='btn-container'>
                                <button class='btn btn-primary'>
                                    <a class='link' href='index.php'>Log In</a>
                                </button>
                            </div>
                        </div>
                    ";
                }
                $result->free();
            }
            $mysqli->close();
        } else { 
            echo "
                <p>Unknown user</p><br>
                <a href='index.php'>Log In</a>
            ";
        }
        ?>
    </body>
</html>