<?php
require_once '../../dbconfig/dbpdologin.php';
 if(isset($_GET['block_id'])){

 	$blockid = $_GET['block_id'];
 	$newstatus = 'blocked';
	$stmt = $db->prepare('UPDATE useraccepttranslate 
									     SET accessing_status=:newstatus 
								       WHERE u_id=:uid');
			$stmt->bindParam(':newstatus',$newstatus);
			$stmt->bindParam(':uid',$blockid);
	
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Blocked ...');
				window.location.href='usermanagment.php';
				</script>
			<?php
			}
		}

?>