
		<script src="assets/tinymce-lyrics/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			tinymce.init({
			  selector: 'textarea',
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
		<link rel="stylesheet" type="text/css" href="tinymce-lyrics/css/style.css" />
		<link rel="stylesheet" type="text/css" href="tinymce-lyrics/css/editor.css" />


	
	  <div class="box fade-in one">
		<div id='container'>
			<h1 id="h1">Use The Tinymce Editor To Save Your Lyrics ;-)</h1>
			<p class='info' id="info">Type lyrics in the editor and click Save</p>
				<form onsubmit='umce();ut(); return false;'>

				<textarea id='main_editor' name='editor'></textarea>

					<input type='submit' value='Save' id='submitbtn' name='save' />

				</form>
			
	    </div>
	   </div>
	