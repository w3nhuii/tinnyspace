<?php
$server='localhost';
$username='root';
$password='';
$conn=mysqli_connect($server,$username,$password,"tinnyspace");
if(!$conn){
    die('Could not Connect My Sql:' .mysql_error());
}
?>