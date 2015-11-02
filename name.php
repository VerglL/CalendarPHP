<?php
header("Content-Type: text/html; charset=utf-8");?>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<?php
$a = 'Your name - ';
$a.=$_GET["n"];
echo($a); 
?>