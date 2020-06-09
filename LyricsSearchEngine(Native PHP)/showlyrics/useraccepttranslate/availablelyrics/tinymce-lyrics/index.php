<?php include'checktheuser.php'; ?>
<?php include'tempidlyrics.php'; ?>
<!DOCTYPE html>
<html lang="fa">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="utf-8">
		<script src="http://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
		<script src="tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			tinymce.init({
			  selector: 'textarea',
			  entity_encoding : "raw",
			  encoding: "UTF-8",
			  height: 300,
			  plugins: [
			    'advlist autolink lists link image charmap print preview anchor',
			    'searchreplace visualblocks code fullscreen',
			    'insertdatetime media table contextmenu paste code',
			    'save textcolor'
			  ],
			  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor | bullist numlist outdent indent | code preview media filemanager',
			  content_css: [
			    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
			    '//www.tinymce.com/css/codepen.min.css'
			  ]
			});
		</script>
		<script src="js/editor.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/editor.css" />
		<link rel="stylesheet" type="text/css" href="css/fadecss.css" />
		<style>
		a:link, a:visited {
		    background-color: white;
		    color: black;
		    border: 2px solid green;
		    padding: 10px 20px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		}

		a:hover, a:active {
		    background-color: green;
		    color: white;
				}
		</style>
		<title>Translate Lyrics</title>
	</head>
<body>

	<div class='action'><img src='img/saved.png' alt='saved' /><h3>Sent!</h3></div>
  <div class="box fade-in one">
	<div id='container'>
		<div id='inner'>
		<div style="border: 1px solid; background-color: #ffffcc;">
				<h4 align="center">Translating:</h4>
				<span align="center"><?php echo $row4['lyrics']; ?></span>
		</div>
		
		<h1>Use The Tinymce Editor To Translate Above Lyrics ;-)</h1>
		<p class='info'>Type your words in the editor and click Send</p>
			
			<form onsubmit='umce();ut(); return false;'>

			<textarea id='main_editor' name='editor'>
			</textarea>

				<input type='submit' value='Send' id='submitbtn' name='save' />

			</form>
			<div style="height: 20px;"></div>
			<a href="../av_ly/availablelyrics">Cancel</a>
		</div>
	</div>
  </div>
	
</body>
</html>