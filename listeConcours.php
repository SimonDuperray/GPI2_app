<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">  
        <title>Admin panel</title>
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

                $maRequete = "SELECT * FROM Concours WHERE 1";

                $result = $mysqli->query($maRequete); 

                echo "
                    <div class='container container-div'>
                        <h3 id='welcome'>Drawing competitions list</h3>
                        <table id='compet-array'>
                            <tr>
                                <th>Numero</th>
                                <th>Description</th>
                                <th>State</th>
                                <th>Link</th>
                            </tr>
                ";
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td class='td-table-compet'>".$row['numConcours']."</td>";
                    echo "<td class='td-table-compet'>".$row['description']."</td>";
                    echo "<td class='td-table-compet'>".$row['etat']."</td>";
                    echo "<td class='td-table-compet'>click me</td>";
                    echo "</tr>";
                }
                echo "</table>";
    
                $mysqli->close();
                
                echo "<div class='btn-container'>
                        <button class='btn btn-primary'>    
                            <a class='link' href=\"retourIndex.php\">Menu</a>
                        </button>
                    </div>    
                ";
                echo "</div>";
        
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
