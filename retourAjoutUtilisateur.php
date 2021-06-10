<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">   
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Admin Panel</title>
    </head>
    <body>
        
        <?php 
            $ADMINID = 10;

            session_start();
            $numeroUtilisateur = $_SESSION['utilisateur'];

            if ($numeroUtilisateur == $ADMINID) {
                if (isset($_POST['name']) and isset($_POST['firstname']) ) {
                    $name = htmlspecialchars($_POST['name']);
                    $firstname = htmlspecialchars($_POST['firstname']);
                    $address = htmlspecialchars($_POST['address']);
                    $login = htmlspecialchars($_POST['login']);
                    $password = htmlspecialchars($_POST['password']);

                    $mysqli = new mysqli("localhost", "gpi2", "network", "projet");
                    if($mysqli->connect_error) {
                        exit('DDB connection error');
                    }
                    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                    $mysqli->set_charset("utf8");
                    
                    $name = $mysqli->real_escape_string($name);
                    $firstname = $mysqli->real_escape_string($firstname);
                    $address = $mysqli->real_escape_string($address);
                    $login = $mysqli->real_escape_string($login);
                    $password = $mysqli->real_escape_string($password);

                    $request = "INSERT INTO Utilisateur VALUES (null,'".$name."','".$firstname."', '".$address."','".$login."', PASSWORD('".$password."'));";

                    $result = $mysqli->query($request);
                    if(!$result) {
                        echo "<h1 color='red'>Request failure</h1>";
                    } else {
                        echo "
                            <a href=\"menuAdministrateur.php\"> Admin panel </a> <br><br>
                        ";
                    }
                    $mysqli->close();
                }
            } else {
                echo "
                    <p>You're not admin</p><br>
                    <a href='index.php'>Log In</a>
                ";
            }
        ?>
    </body>
</html>
