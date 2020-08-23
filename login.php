<?php

require_once 'controllers/authController.php';

?>


<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-4 offset-md-4 form-div login">
<form action="login.php" method="POST">
<h3 class="text-center">Login</h3>


<div class="form-group">
 <label for="username">Username or Email</label>
 <input type="text" name="username" class="form-control form-control-lg" required>
</div>
<div class="form-group">
 <label for="password">Password</label>
 <input type="password" name="password" class="form-control form-control-lg" required>
</div>
<div class="form-group">
<button type="submit" name="login-btn" class="btn btn-primary btn-block btn-lg" >Login</button>
</div>
<p class="text-center">Not a member? <a href ="signup.php">Sign up</a></p>


</form>
</div>
</div>

</div>

</body>

</html>