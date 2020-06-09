

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Sign Up</title>

  <link rel="stylesheet" href="assets/demo.css">
  <link rel="stylesheet" href="assets/form-register.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="css/css.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
<script type="text/javascript">
    $(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            alert('The file "' + fileName +  '" has been selected.');
        });
    });
</script>
<style>
.bs-example{
        margin: 20px;
    }
.custom-file-input {
    display: inline-block;
    position: relative;
    color: #533e00;
}
.custom-file-input input {
    visibility: hidden;
    width: 100px
}
.custom-file-input:before {
    content: 'Choose File';
    display: block;
    background: -webkit-linear-gradient( -180deg, #ffdc73, #febf01);
    background: -o-linear-gradient( -180deg, #ffdc73, #febf01);
    background: -moz-linear-gradient( -180deg, #ffdc73, #febf01);
    background: linear-gradient( -180deg, #ffdc73, #febf01);
    border: 3px solid #dca602;
    border-radius: 10px;
    padding: 5px 0px;
    outline: none;
    white-space: nowrap;
    cursor: pointer;
    text-shadow: 1px 1px rgba(255,255,255,0.7);
    font-weight: bold;
    text-align: center;
    font-size: 10pt;
    position: absolute;
    left: 0;
    right: 0;
}
.custom-file-input:hover:before {
    border-color: #febf01;
}
.custom-file-input:active:before {
    background: #febf01;
}
.file-blue:before {
    content: 'Browse File';
    background: -webkit-linear-gradient( -180deg, #99dff5, #02b0e6);
    background: -o-linear-gradient( -180deg, #99dff5, #02b0e6);
    background: -moz-linear-gradient( -180deg, #99dff5, #02b0e6);
    background: linear-gradient( -180deg, #99dff5, #02b0e6);
    border-color: #57cff4;
    color: #FFF;
    text-shadow: 1px 1px rgba(000,000,000,0.5);
}
.file-blue:hover:before {
    border-color: #02b0e6;
}
.file-blue:active:before {
    background: #02b0e6;
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

        <!-- You only need this form and the form-register.css -->

        <form class="form-register" method="post" action="process/register_process.php" enctype="multipart/form-data">

            <div class="form-register-with-email">

                <div class="form-white-background">

                    <div class="form-title-row">
                        <h1>Create an account</h1>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>User Name</span>
                            <input type="text" name="u_name" placeholder="username">
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Email</span>
                            <input type="email" name="email" placeholder="E_mail">
                        </label>
                    <div class="form-row">
                        <label>
                            <span>Password</span>
                            <input type="password" name="password" placeholder="password">
                        </label>
                    </div>

                    <div class="form-row">
                    
                        <label  class="custom-file-input" >
                          <input type="file" name="admin_prof">
                        </label>
                    </div>

                    <div class="form-row">
                        <label class="form-checkbox">
                            <input type="checkbox" name="remember"
                            <?php if(isset($_COOKIE['remember_me'])) {
                                echo 'checked="checked"';
                                }
                                else {
                                    echo '';
                                }
                                ?>>
                            <span>Remember Me</span>
                        </label>
                    </div>

                    <div class="form-row">
                        <button type="submit" name="rbtn">Register</button>
                    </div>

                </div>

            </div>

        </form>

    </div>
  

</body>
</html>

