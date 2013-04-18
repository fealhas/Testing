<html>
<head>
<?php 
$filename = urldecode($filename);
header('Content-Disposition: attachment;Filename='.$filename.'.doc');
header('Content-type: application/vnd.ms-word; format=attachment; ');
header("Content-Transfer-Encoding: binary"); 
echo '<meta http-equiv=Content-Type content="text/html; charset=utf-8">'; 
?>
</head>
<body>
<?php
echo $docData;
?>
</body>
</html>
