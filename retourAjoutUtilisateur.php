<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">   
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>AddUserRes</title>
        <style>
            .container-div {
                border: 1px solid black;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                padding: 50px;
                background-color: lightblue;
                width: 600px;
                border-radius: 10px;
            }
            .link {
                text-decoration: none;
                color: #fff;
            }
            .link:hover {
                color: black;
                text-decoration: none;
            }
            #welcome {
                text-align: center;
            }
            .btn-container {
                text-align: center;
            }
            #msg-err {
                text-align: center;
                font-weight: bold;
                font-size: 17px;
                text-decoration: underline;
            }
        </style>
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

                    echo "
                        <div class='container container-div'>
                    ";

                    if(!$result) {
                        echo "<h1 id='msg-err' color='red'>Request failure</h1>";
                    } else {
                        echo "
                            <h2 id='welcome'>User added !</h2>
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
