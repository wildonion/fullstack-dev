<?
/*session_start();
if(isset($_SESSION['user']) && $_SESSION['user']!=''){
 header("Location:admin.php");
}*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <title>Sign Up Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <h3 class="text-muted">Sign Up System</h3>
        <hr>
      </div>

      <div class="jumbotron" id="form">
        <h1>Admin Registration</h1>
        <form action="registernew.php" method="post">
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="user" placeholder="Email"><br/><br/>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="pass" placeholder="Password"><br/>
        </div>
        
        <button type="submit" class="btn btn-success" name="submit">Sign Up <span class="glyphicon glyphicon-log-in"></span></button>
        </form>
         <?
          if(isset($_POST['submit'])){
           $musername = "root";
           $mpassword = "Qwe%$[rty]*@;123";
           $hostname = "127.0.0.1";
           $db = "movie";
           $port = 3306;
           $dbh=new PDO('mysql:dbname='.$db.';host='.$hostname.";port=".$port,$musername, $mpassword);/*Change The Credentials to connect to database.*/
           if(isset($_POST['user']) && isset($_POST['pass'])){
            $password=$_POST['pass'];
            $sql=$dbh->prepare("SELECT COUNT(*) FROM admin WHERE username=?");
            $sql->execute(array($_POST['user']));
            if($sql->fetchColumn()!=0){
             die("User Exists");
            }else{
             function rand_string($length) {
              $str="";
              $chars = "subinsblogabcdefghijklmanopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
              $size = strlen($chars);
              for($i = 0;$i < $length;$i++) {
               $str .= $chars[rand(0,$size-1)];
              }
              return $str; /* http://subinsb.com/php-generate-random-string */
             }
             $p_salt = rand_string(20); /* http://subinsb.com/php-generate-random-string */
             $site_salt="subinsblogsalt"; /*Common Salt used for password storing on site.*/
             $salted_hash = hash('sha256', $password.$site_salt.$p_salt);
             $sql=$dbh->prepare("INSERT INTO admin (id, username, password, psalt) VALUES (NULL, ?, ?, ?);");
             $sql->execute(array($_POST['user'], $salted_hash, $p_salt));
             echo "<br/><h3 class=\"label label-success\">Successfully Registered.</h3><br/><br/>";
             echo "<img src=\"im/load.gif\" alt=\"loading...\"/>";
             echo "<script>alert('New Admin Registered!')</script>";
             echo "<script>setTimeout(\"window.location.href='admin.php';\",3000)</script>";
            }
           }
          }
         ?>

      </div>

      
    </div> 

  </body>
</html>