<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <style type="text/css">
        #preview img{
        margin: 5px;
        }
        </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head> 
<body>
<form method='post' action='' enctype="multipart/form-data">
   <input type="file" id='files' name="files[]" multiple><br>
   <input type="button" id="submit" value='Upload'>
</form>
</body>
<div id='preview'></div>

</html>
<script>
    $(document).ready(function(){

$('#submit').click(function(){

   var form_data = new FormData();

   // Read selected files
   var totalfiles = document.getElementById('files').files.length;
   for (var index = 0; index < totalfiles; index++) {
      form_data.append("files[]", document.getElementById('files').files[index]);
   }

   // AJAX request
   $.ajax({
     url: 'ajaxfile.php', 
     type: 'post',
     data: form_data,
     dataType: 'json',
     contentType: false,
     processData: false,
     success: function (response) {

       for(var index = 0; index < response.length; index++) {
         var src = response[index];

         // Add img element in <div id='preview'>
         $('#preview').append('<img src="'+src+'" width="200px;" height="200px">');
       }

     }
   });

});

});
</script>