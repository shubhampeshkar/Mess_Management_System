<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
<br><br><br><br><br>
<br><br><br><br><br>
    <div class="container text-center">
  <div class="row">
    <div class="col">
    
    </div>
    <div class="col">
      
    <div class="card text-bg-success mb-3"  style="width: 75rem;  height: 15rem;">
  
  <div class="card-body">
<h2>Today's Veg-Menu </h2>
  <hr>
  <br>
  <form action="planprocess_form.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>&nbsp;&nbsp; &nbsp;&nbsp;

        <label for="plan">Select Plan:</label>
        <select id="plan" name="plan" required>
            <option value="">Select a Plan</option>
            <option value="ONE TIME-VEG PLAN 2100/Month">ONE TIME-VEG PLAN 2100/Month</option>
            <option value="LUNCH & DINNER-VEG PLAN 2100/Month">LUNCH & DINNER-VEG PLAN 2100/Month</option>
            <option value="ONE-TIME NON-VEG PLAN 3600/Month">ONE-TIME NON-VEG PLAN 3600/Month</option>
            <option value="LUNCH & DINNER NON-VEG PLAN 7200/Month">LUNCH & DINNER NON-VEG PLAN 7200/Month</option>
            
        </select><br><br>

        <input type="submit" value="MAKE PAYMENT">
    </form>
  </div>
</div>

    </div>
    <div class="col">
      
    </div>
  </div>
</div>



    </body>
</html>