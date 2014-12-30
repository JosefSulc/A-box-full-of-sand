<?php

$db = new mysqli('127.0.0.1','root','','db');
if($db->connect_errno > 0) echo 'Connection error '.$db->connect_errno;

$stmt = $db->prepare('INSERT INTO sandbox(data) VALUES(?)');

$array = array('dog','cat','elephant','snake','mouse','penguin');

foreach($array as $animal)
{
    $stmt->bind_param('s',$animal);
    $stmt->execute();
    if($db->affected_rows) echo $animal.' inserted!<br>';
    
}