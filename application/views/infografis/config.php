<?php
$host='127.0.0.1';
$dbuser= 'root';
$dbpass='';
$dbselect='pertamini';

try{
    $connect=new PDO ("mysql:host=$host;dbname=$dbselect",$dbuser,$dbpass);
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    /*echo 'Succesfully connect to Database';*/
}
catch(PDOExeption $errormsg){
    echo 'Fail to connect to Database!'.$errormsg->getMessage();
}

?>