<?php

ob_start();
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Campus Pucket</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
	<link rel="shortcut icon" href="assets/staff/img/logo/logo.png" />
    <!-- Bootstrap CSS
		============================================ -->
    	<link href="assets/staff/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<!-- Custom styles for this template -->
    <link href="assets/staff/signin.css" rel="stylesheet">
  </head>
  <body >
      
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      #floatingInput{
          font-size: 16pt;
      }
      input{
          margin-top: 25px;
      }
    </style>
    
        <main class="form-signin text-center">
            <form action="functions/staff_login.php" method="POST">
                <img class="mb-4" src="assets/staff/img/logo/campus pucket logo.png" alt="" width="200" height="150">
                <p class="h3 mb-3 fw-normal">Administrators Only</p>

                <div class="form-floating">
                <input type="text" class="form-control" name='matricultion' id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Matriculation</label>
                </div>

                <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name = "password" placeholder="Password">
                <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            </form>
        </main>

</body>

</html>

<?php

ob_end_flush();
?>