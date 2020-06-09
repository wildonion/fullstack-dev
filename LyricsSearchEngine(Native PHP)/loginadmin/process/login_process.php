<?php 
    require("../../dbconfig/dbpdologin.php"); 
    $submitted_username = ''; 
    if(!empty($_POST)){ 
        if(empty($_POST['password']) && empty($_POST['u_name'])) 
        { 
          header("Location:../login?err=" . urldecode("password and username are empty"));
          exit();
        } 
        $query = " 
            SELECT 
                a_id,
                username, 
                password, 
                salt, 
                email 
            FROM admin 
            WHERE 
                username = :u_name 
        "; 
        $query_params = array( 
            ':u_name' => $_POST['u_name'] 
        ); 
          
        try{ 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        $login_ok = false; 
        $row = $stmt->fetch(); 
        if($row){ 
            $check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            for($round = 0; $round < 65536; $round++){
                $check_password = hash('sha256', $check_password . $row['salt']);
            } 
            if($check_password === $row['password']){
                $login_ok = true;
            } 
        } 
 
        if($login_ok){ 
            unset($row['salt']); 
            unset($row['password']); 
            $_SESSION['user'] = $row;  
            header("Location: ../../rootdirectory/1a2d3m4i5n"); 
            die("Redirecting to: ../../rootdirectory/1a2d3m4i5n"); 
        } 
        else{ 
            
            header("Location:../login?err=" . urldecode("username or password is incorrect"));
            exit();
            $submitted_username = htmlentities($_POST['u_name'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
?>
