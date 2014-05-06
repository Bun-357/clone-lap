<html>
<head>
<title>Upload Form</title>
</head>
<body>

<h3>Your file was successfully read!</h3>

<ul>
<?php foreach($file as $row){?>
<li><?php echo $row;?></li>
<?php } ?>
</ul>

<p><?php echo anchor('upload', 'View Another File!'); ?></p>


</body>
</html>