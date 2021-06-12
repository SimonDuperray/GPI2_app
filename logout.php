<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">  
        <title>Log out</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
            #form-container {
                background-color: lightblue;
                border-radius: 10px;
                padding: 20px;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                width: 400px;
                border: 1px solid black;
                box-shadow: 4px 4px 4px grey;
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
            .pd {
                margin-top: 5px;
            }
        </style>
    </head>
    <body>
        <?php
            session_start();
            session_destroy();
        ?>
        <div class='container container-div'>
            <h3 id='welcome'>GoodBye !</h3>
            <div class='btn-container'>
               <button class='btn btn-primary'>
                  <a class='link' href='index.php'>Log In</a>
               </button>
            </div>
         </div>
    </body>
</html>
