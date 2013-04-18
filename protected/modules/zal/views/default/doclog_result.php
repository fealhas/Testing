<html>
<head>
<?php 
$filename = 'Книга учета';
header('Content-Disposition: attachment;Filename='.$filename.'.doc');
header('Content-type: application/vnd.ms-word; format=attachment; ');
header("Content-Transfer-Encoding: binary"); 
echo '<meta http-equiv=Content-Type content="text/html; charset=utf-8">'; 
?>
</head>
<body>
<center>
<table style="width:500px">
<tr><td style='text-align:center'>n/n</td><td style='text-align:center'>Дата посещения</td><td style='text-align:center'>Ф.И.О.</td></tr>
<tr><td style='text-align:center'>1</td><td style='text-align:center'>2</td><td style='text-align:center'>3</td></tr>
<?php
$i=1;
foreach ($dataProvider as $key=>$value){
    echo "<tr><td style='text-align:center'>".$i++."</td><td style='text-align:center'>".$value->visit_date."</td><td style='width:250px'>".$value->user->lastname." ".$value->user->first_second_name."</td></tr>"; 
}
?>
</table>
</center>
</body>
</html>
