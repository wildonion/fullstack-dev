<?php include 'process/forgotpass_process.php'; ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Retrieve Password</title>

    <link rel="stylesheet" href="assets/demo.css">
    <link rel="stylesheet" href="assets/form-mini.css">
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


    <header>
        <h1>Please Fill The E_mail Field</h1>
    </header>


    <div class="main-content">

        <!-- You only need this form and the form-mini.css -->

        <div class="form-mini-container">

           <div style="height: 20px;"></div>
            
            <h1>Retrieve Password</h1>
            
            <form class="form-mini" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

                <div class="form-row">
                    <?php if(isset($msg)){ echo $msg;} ?>
                </div>

                <div class="form-row">
                    <input type="email" name="email" placeholder="Your Email">
                </div>

                <div class="form-row form-last-row">
                    <button type="submit" name="sbtn">Retrieve</button>
                </div>

                <div class="form-row form-last-row">
                    <button type="button" name="sbtn"><a href="login">Back To Login Page</a></button>
                </div>
            </form>
            
            
        </div>


    </div>

</body>

</html>
