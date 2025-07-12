<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patil Mess</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
    <?php 
include 'header.php'; ?>


<br><br><br><br><br>

<div class="container text-center">
  <div class="row">
    <div class="col">
    
    </div>
    <div class="col">
      
    <div class="card text-bg-success mb-3"  style="width: 75rem;  height: 25rem;">
  
  <div class="card-body">
<h2>LOGIN</h2>
  <hr>

  <br><br>
  <form method="post" action="login_success.php">
  &nbsp;&nbsp;&nbsp;&nbsp;
        <label>Email:</label>
        <input type="email" name="email" size="70" required><br><br><br>
       
        <label>Password:</label>
        <input type="password" name="password"  size="70" required><br><br><br>

       

        <input type="submit" class="btn btn-light" value="Login">
        
    </form>


    



  </div>
</div>

    </div>
    <div class="col">
      
    </div>
  </div>
</div>







<br><br><br><br><br><br><br>
<?php include 'footer.php'; ?>
</body>
</html>