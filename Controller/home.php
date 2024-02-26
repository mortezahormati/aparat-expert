<?php

$config = require basePath('config/db.php');
$db = new Database($config);
$sql="SELECT * from category limit 2 ";
$res =  $db->query($sql)->fetchAll();

//dd($res);
loadView('home');