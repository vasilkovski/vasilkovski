<?php 


try{
$conn = new PDO ("mysql:host=localhost;dbname=Web", "root", "");
}catch(PDOException $e){
    die("Cannot connect with database");
}