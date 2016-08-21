<?php

if(isset($_POST['id'])){
    
    $dsn="mysql:host=localhost;dbname=sandelik1";
    $db = new PDO($dsn, 'root','');
    
    $sql = "DELETE FROM zapisi WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
    $stmt->execute();
    
    
}
