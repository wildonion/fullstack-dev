<?php
require_once("dbconfig.php");
$sql = "SELECT stext, simg FROM aodsite";
$rs = mysqli_query($conn,$sql);
$str = '';
while ($res = mysqli_fetch_array($rs)) {
  $str .= '<a href="admin.php" title="admin page"><img src="im/'.$res['simg'].'" alt="deactive image" width="500" height="400"/></a><br>'.$res['stext'];
}
echo $str;
?>