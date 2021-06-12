<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   <title>Connection-BaA</title>
</head>
<body>
   <div class="container" id="form-container">
      <h1>Be An Artist</h1>
      <div>
         <form action="retourIndex.php" method="POST">
            <div class="mb-3">
               <label for="login" class="form-label">Login</label>
               <input type="text" class="form-control" id="login" name="login" placeholder="Login">
            </div>
            <div class="mb-3">
               <label for="password" class="form-label">Password</label>
               <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Log In" />
         </form>
      </div>
   </div>
</body>
</html>