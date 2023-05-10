<?php 
$host ='localhost';
$user='root';
$pass='';
$db= 'sana';
$con= mysqli_connect($host , $user , $pass , $db);

if(!$con){
    echo "Connction Filed";
    exit();
}