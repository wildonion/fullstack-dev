tinymce.init({
  selector: '#lyrics',
  width: 600,
  height: 170,
  fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'emoticons',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code',
    'save textcolor'
  ],
  toolbar: 'insertfile undo redo | styleselect | fontselect | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor | media filemanager | preview emoticons'
});