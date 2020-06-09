<?php
require_once '../../dbconfig/dbpdologin.php';
 if(isset($_GET['unblock_id'])){

 	$blockid = $_GET['unblock_id'];
 	$newstatus = 'unblocked';
	$stmt = $db->prepare('UPDATE useraccepttranslate 
									     SET accessing_status=:newstatus 
								       WHERE u_id=:uid');
			$stmt->bindParam(':newstatus',$newstatus);
			$stmt->bindParam(':uid',$blockid);
	
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Unblocked ...');
				window.location.href='usermanagment.php';
				</script>
			<?php
			}
		}

?>