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

    <div class="container text-center">
      <div class="row">
        <div class="col"></div>
        <div class="col">
          <div class="card text-white bg-success border border-dark mb-4" style="width: 75rem; height: 38rem;">
            <div class="card-body">
              <h2>Select Plan</h2>
              <hr>
              <form action="paymentprocess.php" method="post" onsubmit="return validateForm()">
                <div class="mb-3">
                  <label for="name" class="form-label">Name:</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email:</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                  <div id="emailError" class="text-danger"></div>
                </div>
                <div class="mb-3">
                  <label for="plan" class="form-label">Plan:</label>
                  <select class="form-select" id="plan" name="plan" required>
                    <option value="">Select</option>
                    <option value="ONE TIME-NON-VEG LUNCH PLAN">ONE TIME-NON-VEG LUNCH PLAN</option>
                    <option value="ONE TIME-NON-VEG DINNER PLAN">ONE TIME-NON-VEG DINNER PLAN</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="amount" class="form-label">Amount:</label>
                  <input type="text" class="form-control" id="amount" name="amount" value="3600" readonly>
                </div>
                <div class="mb-3">
                  <label for="date" class="form-label">Date:</label>
                  <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <button type="submit" class="btn btn-warning">Continue</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col"></div>
      </div>
    </div>

    <script>
      // Email validation function
      function validateEmail(email) {
        var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
      }

      function validateForm() {
        var email = document.getElementById('email').value;
        var emailError = document.getElementById('emailError');
        if (!validateEmail(email)) {
          emailError.textContent = "Please enter a valid email address.";
          return false;
        } else {
          emailError.textContent = "";
        }
        return true;
      }
    </script>
  </body>
</html>
