<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
        <link rel="stylesheet" href="style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> 
        <title>CreationCompetRes</title>
    </head>
    <body>
        <?php
            $ADMINID = 10; 

            session_start();
            $numeroUtilisateur = $_SESSION['utilisateur'];

            if ($numeroUtilisateur == $ADMINID) {
                if (isset($_POST['description'])) {
                    $description = htmlspecialchars($_POST['description']);
                    $date_debut = htmlspecialchars($_POST['date_debut']);
                    $date_fin = htmlspecialchars($_POST['date_fin']);  
                    $president = htmlspecialchars($_POST['president']);  

                    $mysqli = new mysqli("localhost", "gpi2", "network", "projet");
                    if($mysqli->connect_error) {
                        exit('Impossible de se connecter à la BD');
                    }
                    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                    $mysqli->set_charset("utf8");
                    
                    $description = $mysqli->real_escape_string($description);
                    $date_debut = $mysqli->real_escape_string($date_debut);
                    $date_fin = $mysqli->real_escape_string($date_fin);
                    $president = $mysqli->real_escape_string($president);
                    $state = $mysqli->real_escape_string('en cours');

                    $request = "INSERT INTO Concours VALUES (null, '".$president."', '".$state."', '".$description."','".$date_debut."', '".$date_fin."');";
                
                    $result = $mysqli->query($request);    
                    
                    echo "
                        <div class='container container-div'>
                    ";

                    if(!$result) {
                        echo "<h1 id='msg-err' color='red'>Request failure</h1>";
                    } else {
                        echo "
                            <h2 id='welcome'>Competition created !</h2>
                            <div class='btn-container'>
                                <button class='btn btn-primary'>
                                    <a class='link' href=\"menuAdministrateur.php\">Admin panel</a>
                                </button>
                            </div>
                        ";
                    }
                    echo "</div>";
                    $mysqli->close();
                }
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
    </body>
</html>
