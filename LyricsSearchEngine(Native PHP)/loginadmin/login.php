<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Login</title>

  <link rel="stylesheet" href="assets/demo.css">
  <link rel="stylesheet" href="assets/form-login.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    .bs-example{
        margin: 20px;
    }
</style>

</head>

<body>

<header>
    <h1>Fill The Below Fields To Access Your Dashboard</h1>
    </header>

<?php if(isset($_GET['err'])) { ?>
  <div class="bs-example">
    <div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> <?php echo $_GET['err']; ?>
    </div>
  <?php } ?>

    <div class="main-content">
        <form class="form-login" method="post" action="process/login_process.php">

            <div class="form-log-in-with-email">

                <div class="form-white-background">

                    <div class="form-title-row">
                        <h1>Log in</h1>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>User Name</span>
                            <input type="text" name="u_name" placeholder="username" value="<?php echo @$_COOKIE['remember_me']; ?>">
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Password</span>
                            <input type="password" name="password" placeholder="password">
                        </label>
                    </div>

                    <div class="form-row">
                        <button type="submit">Log in</button>
                    </div>

                </div>

                <a href="forgotpass" class="form-forgotten-password">Forgotten password &middot;</a>
                <a href="registernew" class="form-create-an-account">Create an account &rarr;</a>

            </div>

        </form>

    </div>
  

</body>
</html>

