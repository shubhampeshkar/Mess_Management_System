<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Patil Mess</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <?php include 'header.php'; ?>

  <br><br>

  <div class="container text-center">
    <div class="row">
      <div class="col"></div>
      <div class="col">
        <div class="card text-bg-success mb-3" style="width: 45rem; height: 42rem;">
          <div class="card-body">
            <h2>Registration Form</h2>
            <hr>
            <form method="post" action="register_process.php" onsubmit="return validateForm()">
              <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="mb-3">
                <label for="mobile" class="form-label">Mobile No:</label>
                <input type="text" class="form-control" id="mobile" name="mobile" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control" id="address" name="address" required>
              </div>
              <div class="mb-3">
                <label for="date" class="form-label">Date:</label>
                <input type="date" class="form-control" id="date" name="date" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" class="btn btn-light">Submit</button>
            </form>
            <br>
            
          </div>
        </div>
      </div>
      <div class="col"></div>
    </div>
  </div>


  <div class="alert alert-warning" role="alert">
              <div class="center">
            <center>  <a class="btn btn-warning" href="index.php" role="button">Back To Home Page</a></center>
              </div>
            </div>


  <?php include 'footer.php'; ?>

  <script>
    function validateForm() {
      const mobile = document.getElementById('mobile').value;
      const email = document.getElementById('email').value;

      // Mobile number validation
      const mobilePattern = /^[0-9]{10}$/;
      if (!mobilePattern.test(mobile)) {
        alert('Please enter a valid 10-digit mobile number.');
        return false;
      }

      // Email validation
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(email)) {
        alert('Please enter a valid email address.');
        return false;
      }

      return true;
    }
  </script>

</body>

</html>
