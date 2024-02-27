<?php
$config = require basePath('config/db.php');
$db = new Database($config);
$sql="SELECT * from category" ;
$data =  $db->query($sql)->fetchAll();

echo $data ;
?>