<?php
// insert data into database using PDO
    require("../../dbconfig/dbpdologin.php");
    if(!empty($_POST) && isset($_POST["rbtn"])) 
    { 
        function check_email_address($email) {
              // First, we check that there's one @ symbol, 
              // and that the lengths are right.
              if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
                // Email invalid because wrong number of characters 
                // in one section or wrong number of @ symbols.
                return false;
              }
              // Split it into sections to make life easier
              $email_array = explode("@", $email);
              $local_array = explode(".", $email_array[0]);
              for ($i = 0; $i < sizeof($local_array); $i++) {
                if
            (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&
            ↪'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
            $local_array[$i])) {
                  return false;
                }
              }
              // Check if domain is IP. If not, 
              // it should be valid domain name
              if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
                $domain_array = explode(".", $email_array[1]);
                if (sizeof($domain_array) < 2) {
                    return false; // Not enough parts to domain
                }
                for ($i = 0; $i < sizeof($domain_array); $i++) {
                  if
            (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|
            ↪([A-Za-z0-9]+))$",
            $domain_array[$i])) {
                    return false;
                  }
                }
              }
              return true;
            } // end of function 

        $imgFile = $_FILES['admin_prof']['name'];
        $tmp_dir = $_FILES['admin_prof']['tmp_name'];
        $imgSize = $_FILES['admin_prof']['size'];
        $year = time() + 31536000;
        setcookie('remember_me', $_POST['u_name'], $year);
        
        // Ensure that the user fills out fields 
        #####################################################################################################
        if(empty($_POST['u_name'])) 
        {  
          header("Location:../registernew?err=" . urldecode("username is empty"));
          exit();
        } 
        if(empty($_POST['password'])) 
        { 
          header("Location:../registernew?err=" . urldecode("password is empty"));
          exit();
        } 
        if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $_POST['password']))
        {
          header("Location:../registernew?err=" . urldecode("Your password is not safe"));
          exit();
        }
        if(!check_email_address($_POST['email'])) 
        {  
          header("Location:../registernew?err=" . urldecode("invalid E_mail address"));
          exit();
        } 
        if(empty($imgFile))
        { 
          header("Location:../registernew?err=" . urldecode("choose an image for your profile"));
          exit();;
        }
        #####################################################################################################
        // Check if the username is already taken
        $query = " 
            SELECT 
                1 
            FROM admin 
            WHERE 
                username = :u_name 
        "; 
        $query_params = array( ':u_name' => $_POST['u_name'] ); 
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        $row = $stmt->fetch(); 
        if($row){
            header("Location:../registernew?err=" . urldecode("this username is already exists"));
            exit();
            } 
        $query = " 
            SELECT 
                1 
            FROM admin 
            WHERE 
                email = :email 
        "; 
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage());} 
        $row = $stmt->fetch(); 
        if($row){
            header("Location:../registernew?err=" . urldecode("this E_mail is already Registered"));
            exit(); 
           } 
  
         #####################################################################################################
          $upload_dir = '../../rootdirectory/adminprof/'; // upload directory
 
           $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
          
           // valid image extensions
           $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
          
           // rename uploading image
           $userpic = rand(1000,1000000).".".$imgExt;
            
           // allow valid image file formats
           if(in_array($imgExt, $valid_extensions)){   
            // Check file size '5MB'
            if($imgSize < 5000000)    {
             move_uploaded_file($tmp_dir,$upload_dir.$userpic);
            }
            else{
             header("Location:../registernew?err=" . urldecode("Sorry, your image is too large"));
             exit();
            }
           }
           else{
            header("Location:../registernew?err=" . urldecode("invalid image format"));
            exit();
           }
           #####################################################################################################
        // Security measures
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
        $password = hash('sha256', $_POST['password'] . $salt); 
        for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); }
        // nver trust user input!!
        $username = strip_tags($_POST["u_name"]);
        $email = strip_tags($_POST["email"]); 
        
        $query_params = array( 
            ':username' => $username, 
            ':password' => $password, 
            ':salt' => $salt, 
            ':email' => $email,
            ':admin_pic' => $userpic
        ); 
    // Add row to database 
        $query = " 
            INSERT INTO admin ( 
                username, 
                password, 
                salt, 
                email,
                admin_pic
            ) VALUES ( 
                :username, 
                :password, 
                :salt, 
                :email,
                :admin_pic
            ) 
        ";
        try {  
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        header("Location: ../login"); 
        die("Redirecting to login"); 
    } 
?>