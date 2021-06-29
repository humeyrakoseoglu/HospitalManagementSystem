<?php
try{
 $db=new PDO("mysql:host=localhost; dbname=Hospital;charest=utf8",'root','');
}catch(Exception $e){
    echo $e->getMessage();
}
?>