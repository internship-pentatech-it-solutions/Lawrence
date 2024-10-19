<?php
require_once'./include/connection.php';


if(isset($_GET['id'])){
    $id= $_GET['id'];

    $query= "DELETE FROM employee WHERE ID = $id";

    $stmt = $conn->prepare($query);    
    $stmt->execute(); 
    
    echo 'Data Deleted Successfully';

    header('location:./index.php');
}










?>