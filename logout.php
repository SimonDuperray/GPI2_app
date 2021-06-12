<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">  
        <title>Log out</title>
        <link rel="stylesheet" href="style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
