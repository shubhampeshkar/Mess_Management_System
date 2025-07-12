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

<br><br>

<div class="container text-center">
  <div class="row">
    <div class="col">
    
    </div>
    <div class="col">
      
    <div class="card text-bg-success mb-3"  style="width: 75rem;  height: 38rem;">
  
  <div class="card-body">
<h2>For More Details Contact Us </h2>
  <hr>

  <form method="post" action="register_process.php">
  &nbsp;&nbsp;
        <label>Name:</label>
        <input type="text" name="name"  size="22" required> &nbsp;&nbsp; &nbsp;&nbsp;
        <label>Mobile No:</label>
        <input type="text" name="mobile"  size="22" required>&nbsp;&nbsp; &nbsp;&nbsp;        
        <label>Email:</label>
        <input type="email" name="email" size="22" required><br><br>
        <label>Describe Here:</label><br>
        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; <input type="text" name="describe" size="103" required><br><br>


        <button type="button" class="btn btn-light">Submit</button>
    </form>



<hr>
<h2>Our Details</h2>


<div class="card" style="width: 73rem; height: 15rem">
  <div class="card-body">
    <h4 class="card-title">Contact Number</h4>
    <h4 class="card-title">7875557787</h4>

    <hr>
    
    <h4 class="card-title">Address</h4>
    <h4 class="card-title">Near Gajanan Maharaj Mandir, Pradhikaran Nigdi.</h4>
    

  </div>
</div>


    
  </div>
</div>

    </div>
    <div class="col">
      
    </div>
  </div>
</div>

<br>

<?php 
include 'footer.php'; ?>
</body>
</html>