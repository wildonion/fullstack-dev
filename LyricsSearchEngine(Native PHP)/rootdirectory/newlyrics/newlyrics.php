<?php include 'checktheuser.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add New Lyrics</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../assets/style.css">
<link rel="stylesheet" type="text/css" href="assets/style.css">
<link rel="stylesheet" type="text/css" href="assets/fadecss.css">
<script src="validation.js"></script>
<script src="assets/tinymce-lyrics/js/editor.js"></script>
</head>
<body>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="container">
<div id="loadgif" align="center"></div>
 <div class="form">
  <div class="box fade-in one">
    <ul class="flex-outer">
      <li>
        <label for="name-of-song">Artist</label>
        <input type="text" name="artist" id="artist" placeholder="artist here..."> 
      </li>
	  <li>
        <label for="name-of-song">Name Of Music</label>
        <input type="text" name="mname" id="mname" placeholder="name of music here + name of artist here..."> 
      </li>
      <li>
        <label for="name-of-singer">Name Of Singer</label>
        <input type="text" id="sname" name="sname" placeholder="name of singer here..."> 
      </li>
      <li>
        <label for="publish-year">Released</label>
        <input type="text" id="publishyear" name="publishyear" placeholder="released year here..."> 
      </li>
      <li>
        <label for="genre">Genres</label>
        <input type="text" id="genre" name="genre" placeholder="genre of music here..."> 
      </li>
      <li>
        <label for="album">Album</label>
        <input type="text" id="album" name="album" placeholder="album here..."> 
      </li>
      <li>
        <button id="FormSubmit">Add Lyrics Info</button>
      </li>
      <img src="images/loading.gif" id="LoadingImage" style="display:none" />
    </ul>
  </div>
 </div>
</div>

</body>
</html>