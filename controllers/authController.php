<?php

session_start();

require 'config/db.php';

$errors= array();
$username='';
$password='';
$passwordConf='';
$email='';

//if user clicked submit

if(isset($_POST['signup-btn'])){

$username= $_POST['username'];
$email = $_POST['email'];
$password=$_POST['password'];
$passwordConf=$_POST['passwordConf'];

//validate items

if(empty($username)){
    $errors['username']= 'Username required';

}

if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors['email']="Email address is invalid";
}


if(empty($email)){
    $errors['email']= 'Email required';

}
if(empty($password)){
    $errors['password']= 'password required';

}

if($password !== $passwordConf ){
    $errors['password'] = 'The two passwords do not match';
}




}
//check if email entered by user is already in database
$emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1 ";

$stmt = $conn->prepare($emailQuery);

$stmt->bind_param('s', $email);
$stmt->execute();

$result=$stmt->get_result();

$userCount= $result->num_rows;
$stmt->close();

if($userCount > 0){
$errors['email'] = 'Email already exists';
}
//end off email check

//if no errors save user to the db
if(count($errors)===0){
    //encrypt the password
    $password = password_hash($password, PASSWORD_DEFAULT);
    //generate random token
    $token = bin2hex(random_bytes(50));
    //set verified attribute
    $verified=false;

    //write query to save data
    $sql= "INSERT INTO users (username, email, verified, token, password) VALUES(?, ?, ?, ?, ?) ";
    $stmt=$conn->prepare($sql);
    $stmt ->bind_param('ssbss', $username, $email, $verified, $token, $password );
    
    //save to db
if($stmt->execute()){
    //success login user

    //attach the last connected id to $user_id
    $user_id = $conn->insert_id;

    //attach $user_id to the session id array
    $_SESSION['id']= $user_id;
    $_SESSION['username']= $username;
    $_SESSION['email']= $email;
    $_SESSION['verified']= $verified;
    //display message
    $_SESSION['message']='You are now logged in';
    $_SESSION['alert-class']="alert-success";
 
    header('location: index.php');
    exit();
}else{
    //error
$errors['db_error']= "database error: failed to register";
}
    

}


//iff user clicks login

if(isset($_POST['login-btn'])){

    $username= $_POST['username'];
    $password=$_POST['password'];
   
    //validate items
    
    if(empty($username)){
        $errors['username']= 'Username required';
    
    }
    
   if(empty($password)){
        $errors['password']= 'password required';
    
    }

    if(count($errors)===0){

 
        $sql = "SELECT * FROM users where email=? OR username=? LIMIT 1";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user=$result->fetch_assoc();
    
        if(password_verify($password, $user['password'])){
     //success login user
    
        //attach the last connected id to $user
        //attach $user_id to the session id array
        $_SESSION['id']= $user['id'];
        $_SESSION['username']= $user['username'];
        $_SESSION['email']= $user['email'];
        $_SESSION['verified']= $user['verified'];
        //display message
        $_SESSION['message']='You are now logged in';
        $_SESSION['alert-class']="alert-success";
     
        header('location: index.php');
        exit();
    
        }
        else{
            $errors['login_fail'] = "Wrong credentials";
        }

    }
    
     
    
    }


?>