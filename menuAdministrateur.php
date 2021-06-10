<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> 
        <title>Admin panel</title>
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
            echo "
            <div class='container container-div'>
                <h2 id='welcome'>Admin panel</h2>
                <div class='btn-container'>
                    <button class='btn btn-primary'>
                        <a class='link' href=\"ajoutUtilisateur.php\">Add user</a>
                    </button>
                    <button class='btn btn-primary'>
                        <a class='link' href=\"creationConcours.php\">Create competition</a>
                    </button>
                </div>
            </div>
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
    </body>
</html>



