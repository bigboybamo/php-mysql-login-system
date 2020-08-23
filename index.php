<?php 

require_once 'controllers/authController.php';

?>

<html>
<head>
<title>Homepage</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-4 offset-md-4 form-div login">
<?php if(isset($_SESSION['messgae'])):  ?>
<div class="alert <?php echo $_SESSION['alert-class'] ;  ?> ">
    <?php 
    
    echo $_SESSION['message'] ;  
    unset( $_SESSION['message']);
    unset( $_SESSION['alert-class']);
    ?>
</div>
<?php endif ?>

<h2> Welcome, <?php echo $_SESSION['username']; ?></h2>
<a href="#" class="logout">logout</a>


<?php  if(!$_SESSION['verified']): ?>
<div class="alert alert-warning">
You need to verify your account.
Sign in to your email account and click on the 
verification link we just emailed you at  <strong><?php echo $_SESSION['email'] ;  ?></strong>

</div>
<?php endif ?>
<?php  if($_SESSION['verified']): ?>
<button class="btn btn-block btn-lg btn-primary" > Verified!!! </button>
<?php endif ?>
</div>
</div>

</div>

</body>

</html>