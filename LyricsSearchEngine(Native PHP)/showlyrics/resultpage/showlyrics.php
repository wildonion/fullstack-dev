<?php include'assets/checkthequery.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php if($query->rowCount()>0){echo $row['name_of_music'];}?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="assets/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container">
  <div id="header">
    <ul>
      <li id="navtop"></li>
      <li><a class="link" href="../useraccepttranslate/index">Translate Lyrics</a></li>
      <li><a class="link" href="#">Contact us</a></li>
      <li id="navbottom"></li>
    </ul>
 </div>
  <div id="content">
    <div id="left">
      <h3><?php if($query->rowCount()>0){echo $row['name_of_music'];}?></h3>
      <?php if($query->rowCount()<0){echo "no result found ;-(";}else{echo $row['lyrics'];} ?>
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <img id="djset" src="assets/images/djset.gif" alt="djset" /></div>
    <div id="middle">
      <h3>TRANSLATED LYRICS</h3>
      <?php  if($query->rowCount()>0){if($row['translated_lyrics'] == "no"){echo "no translated lyrics available yet!";} else{echo $row['translated_lyrics'];} }?>
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      </div>
    <div id="right"> <img src="assets/images/timetoparty.jpg" 
                    alt="time to party" width="265" height="250" />
      <p>Find Your Lyrics ;-)</p>
   </div>
    <div class="clear"></div>
    <div id="footer">
      <p>&copy; Copyright 2016.All rights reserved. | designed by Erfan Arefi(old style)
   </div>
 </div>
</div>
</body>
</html>
