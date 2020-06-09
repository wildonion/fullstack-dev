<?php
include'assets/dbpdologin.php'; 
$stmt1 = $db->prepare("SELECT havenewitem FROM msgfromadmin WHERE user_id=:id");
$stmt1->execute(array(':id'=>$row['u_id']));
$row1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
foreach ($row1 as $new_row):
    if($new_row['havenewitem'] == 'new'){
    ?>
        <a href="allmsg/allmsg.php"><img src="assets/new icon.gif" alt="new" width="25" height="25"> <img src="assets/inbox.png" alt="inbox" width="23" height="23">
    
        </a>  
  <?php
 
}
endforeach;
?>