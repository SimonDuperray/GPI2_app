<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">  
        <title>CreateCompetition</title>
        <link rel="stylesheet" href="style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    <body>
        <?php 
            $ADMINID = 10;

            session_start();
            $numeroUtilisateur = $_SESSION['utilisateur'];

            if ($numeroUtilisateur == $ADMINID) {

                $mysqli = new mysqli("localhost", "gpi2", "network", "projet");
                if($mysqli->connect_error) {
                    exit('DDB connection error');
                }
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $mysqli->set_charset("utf8");

                $request = "SELECT * FROM Utilisateur WHERE numUtilisateur != $ADMINID";

                $result = $mysqli->query($request); 

                echo "
                    <div class='container' id='form-container'>
                        <form action='retourCreationConcours.php' method='POST'>
                            <h3 id='welcome'>Create competition</h3>
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
                    <div class='btn-container'>
                        <input type='submit' class='btn btn-primary' name='submit' value='Create Competition'>
                    </div>
                ";
    
                $mysqli->close();
                
                echo "
                    <div class='btn-container'>
                        <button class='btn btn-primary mgt'>
                            <a class='link' href=\"menuAdministrateur.php\">Go Admin Panel</a>
                        </button>
                    </div>
                    </form></div>
                ";
        
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
