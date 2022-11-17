<?php
session_start();
//checking if user is already logged in
if (isset($_SESSION['user']))
  header("Location:./success.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <title>Login</title>
</head>

<body>

<?php 
if(isset($_SESSION['errors'])){
  echo '<div class="alert alert-danger" role="alert">' . $_SESSION['errors'] . '</div>';
  unset($_SESSION['errors']);
} 
?>
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-3">

                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-5">Please enter your login and password!</p>
                <!-- login form -->
                <form action="../../controllers/loginController.php" method="post">
                  <div class="form-outline form-white mb-4">
                    <!-- retrieving cookie value set at the time of registration -->
                    <input type="email" value="<?php if(isset($_COOKIE['userEmail'])) echo $_COOKIE['userEmail']; ?>" name="email" id="email" class="form-control form-control-lg" />
                    <label class="form-label" for="email">Email</label>
                  </div>

                  <div class="form-outline form-white mb-4">
                    <input type="password" value="<?php if(isset($_COOKIE['userPass'])) echo $_COOKIE['userPass']; ?>" name="pass" id="pass" class="form-control form-control-lg" />
                    <label class="form-label" for="pass">Password</label>
                  </div>
                  <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
              </div>
              </form>
              <div>
                <p class="mb-0">Don't have an account? <a href="../registration/index.php" class="text-white-50 fw-bold">Sign Up</a>
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>