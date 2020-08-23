<?php

require_once 'controllers/authController.php';

?>



<html>
<head>
<title> Register</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-4 offset-md-4 form-div">
<form action="signup.php" method="POST">
<h3 class="text-center">Register</h3>
<div class="form-group">
 <label for="username">Username</label>
 <input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg" required>
</div>
<div class="form-group">
 <label for="email">Email</label>
 <input type="email" name="email" value="<?php echo $email;?>" class="form-control form-control-lg" required>
</div>
<div class="form-group">
 <label for="password">Password</label>
 <input type="password" name="password" class="form-control form-control-lg" required>
</div>
<div class="form-group">
 <label for="passwordConf">Confirm Password</label>
 <input type="password" name="passwordConf" class="form-control form-control-lg" required>
</div>

<div class="form-group">
<button type="submit" name="signup-btn" class="btn btn-primary btn-block btn-lg" >Submit</button>
</div>
<p class="text-center">Already a member? <a href ="login.php">Sign in</a></p>


</form>
</div>
</div>

</div>

</body>

</html>