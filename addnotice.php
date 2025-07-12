
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
  <body>

  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
    <br><br><br><br><br><br>

    <div class="container text-center">
  <div class="row">
    <div class="col">
    
    </div>
    <div class="col">
      
    <div class="card text-white bg-dark border border-dark mb-4" style="width: 75rem; height: 30rem;">
  
  <div class="card-body">
<h2>Add Notice </h2>
  <hr>

  <form action="updatenotice.php" method="post">
            <div class="form-group">
                <label for="notice">Notice:</label>
                <textarea class="form-control" id="notice" name="notice" rows="5" cols="50" required></textarea>

            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <br><br>
        <div class="alert alert-warning" role="alert">

<div class="center">
<a class="btn btn-warning" href="admindashboard.php" role="button">Back To Admin Page</a>
</div>

  </div>
</div>

    </div>
    <div class="col">
      
    </div>
  </div>
</div>







    </body>
</html>