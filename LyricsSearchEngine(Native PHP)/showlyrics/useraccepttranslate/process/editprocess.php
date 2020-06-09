<?php
if(isset($_POST['btn_save_updates'])){
        
    require_once 'class.user.php';
    $edit_user = new USER();

    $new_username = $_POST['user_name'];
    $new_email = $_POST['user_email'];

    if(empty($new_email)){
        $errMSG = "Choose an Email_Address";   
    }
    if(empty($new_username)){
        $errMSG = "Choose a Username";
    }

    if(!empty($_POST) && !isset($errMSG)){
        $stmt = $edit_user->runQuery("UPDATE useraccepttranslate SET user_name=:newusername, 
                                                                     email=:newemail 
                                                                 WHERE u_id=:uid");
        $stmt->execute(array(":newusername"=>$new_username,
                             ":newemail"=>$new_email,
                             ":uid"=>$_SESSION['userSession']));
        if($stmt){
        ?>
            <script>
            alert('Successfully Updated ...');
            window.location.href='editprof.php';
            </script>
         <?php
        }
            else{
                $errMSG = "Sorry Data Could Not Updated !";
            }
    }

}

?>