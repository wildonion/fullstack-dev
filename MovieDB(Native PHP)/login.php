<?php
session_start();
if(isset($_SESSION['user']) && $_SESSION['user']!=''){header("Location:admin.php");}
$dbh=new PDO('mysql:dbname=movie;host=127.0.0.1', 'root', 'Qwe%$[rty]*@;123');/*Change The Credentials to connect to database.*/
if(isset($_POST['Submit'])){
$email=$_POST['mail'];
$password=$_POST['pass'];
}
if(isset($_POST['Submit']) && $email!='' && $password!=''){
 $sql=$dbh->prepare("SELECT id,password,psalt FROM admin WHERE username=?");
 $sql->execute(array($email));
 $count = $sql->rowCount();
 if($count){
 while($r=$sql->fetch()){
  $p=$r['password'];
  $p_salt=$r['psalt'];
  $id=$r['id'];
 }
 $site_salt="subinsblogsalt";/*Common Salt used for password storing on site. You can't change it. If you want to change it, change it when you register a user.*/
 $salted_hash = hash('sha256',$password.$site_salt.$p_salt);
 if($p==$salted_hash){
  $_SESSION['user']=$id;
  header("Location: admin.php");
   }
 }
 else{
  echo "<h2 class=\"alert alert-danger\">Username/Password is Incorrect.</h2>";
   }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <title>Login Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="sandbox/style.css"/>
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <h3 class="text-muted">Login System</h3>
        <hr>
      </div>

      <div class="jumbotron" id="form">
        <h1>Login</h1>
        <form method="post" action="login.php">
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="mail" placeholder="Email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="pass" placeholder="Password"><br/><br/>
        </div>
        <button class="label label-info" type="submit"  name="Submit">Login <span class="glyphicon glyphicon-log-in"></span></button>
        <a href="#" class="label label-danger">Forgot Password?</a>
        </form>
        

      </div>

      
    </div> 

  </body>
</html>