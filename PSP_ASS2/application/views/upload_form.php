<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php //echo form_open_multipart('upload/readFile');?>
<form method="post" action="/PSP_ASS2/index.php/countCode/getFileName">

<input type="file" name="file" id="file" /><br /><br />

<br /><br />

<input type="submit" value="read" />

</form>

</body>
</html>