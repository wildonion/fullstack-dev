<?php

require_once '../../../../dbconfig/oopconnection.php';

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function lasdID()
	{
		$stmt = $this->conn->lastInsertId();
		return $stmt;
	}
	
	public function register($uname,$email,$upass,$code)
	{
		try
		{							
			$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
            $password = hash('sha256', $upass . $salt); 
            for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); }
			
			$stmt = $this->conn->prepare("INSERT INTO useraccepttranslate(user_name,email,password,psalt,tokenCode) 
			                                             VALUES(:user_name, :user_mail, :user_pass, :user_salt, :active_code)");
			$stmt->bindparam(":user_name",$uname);
			$stmt->bindparam(":user_mail",$email);
			$stmt->bindparam(":user_pass",$password);
			$stmt->bindparam(":user_salt",$salt);
			$stmt->bindparam(":active_code",$code);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function login($email,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM useraccepttranslate WHERE email=:email_id");
			$stmt->execute(array(":email_id"=>$email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			
			if($stmt->rowCount() == 1)
			{
				if($userRow['userStatus']=="Y")
				{

					if($userRow['accessing_status'] == 'blocked'){
						header("Location: index.php?accessing_status");
						exit;

					}
					    $login_ok = false; 
			            $check_password = hash('sha256', $upass . $userRow['psalt']); 
			            for($round = 0; $round < 65536; $round++){
			                $check_password = hash('sha256', $check_password . $userRow['psalt']);
			            } 
			            if($check_password === $userRow['password']){
			                $login_ok = true;
			            } 
			        
					if($login_ok)
					{
						$_SESSION['userSession'] = $userRow['u_id'];
						return true;
					}
					else
					{
						header("Location: index.php?error");
						exit;
					}
					
				}
				else
				{
					header("Location: index.php?inactive");
					exit;
				}	
			}
			else
			{
				header("Location: index.php?error");
				exit;
			}		
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	
	public function is_logged_in()
	{
		if(isset($_SESSION['userSession']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function logout()
	{
		session_destroy();
		$_SESSION['userSession'] = false;
	}
	
	function send_mail($email,$message,$subject)
	{						
		require_once('assets/composer/vendor/autoload.php');
		$config = parse_ini_file('assets/info.ini', true);

		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug  = 0;                     
		$mail->SMTPAuth   = true;                  
		$mail->SMTPSecure = "tls";
		$mail->SMTPAutoTLS = false;                 
		$mail->Host       = "smtp.gmail.com";      
		$mail->Port       = 587;             
		$mail->AddAddress($email);
		$mail->Username= $config['email']['username'];  
		$mail->Password= $config['email']['password'];            
		$mail->SetFrom('abarmardeatashyne@gmail.com','Admin');
		$mail->AddReplyTo("abarmardeatashyne@gmail.com","Reply Message");
		$mail->Subject    = $subject;
		$mail->MsgHTML($message);
		$mail->Send();
	}	
}