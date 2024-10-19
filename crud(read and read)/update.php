<?php 
require_once'./include/connection.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query= "SELECT * FROM employee WHERE ID = $id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST['submit'])){
        $name = $_POST['name'];  
        $position = $_POST['position'];  
        $department = $_POST['department'];  
        $age = $_POST['age'];
        
        $query = "UPDATE employee SET name='$name', position='$position', department='$department' , age='$age'  WHERE ID = '$id' ";
        $stmt = $conn->prepare($query);   
        $stmt->execute(); 
        
        header('location:./index.php');
    }
    
     
}

?>

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Document</title>  
    <style>  
        /* Center the body content */  
        body {  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            height: 100vh; /* Full height of the viewport */  
            margin: 0; /* Remove default margin */  
            background-color: #f4f4f4; /* Optional: light background color */  
        }  

        .box {  
            justify-content: center;  
            align-content: center;  
        }  

        .box form {  
            background-color: #fff;  
            padding: 20px;  
            border-radius: 5px;  
            box-shadow: 0 0 10px rgba(1, 1, 1, 0.5);  
            width: 450px;  
        }  
  
        .box form label {  
            display: block;  
            font-weight: bold;  
            margin-bottom: 5px;  
        }  
        
        .box form input {  
            width: 100%;  
            padding: 10px;  
            border: 1px solid #ddd;  
            border-radius: 3px;  
            margin-bottom: 6px;  
            font-size: 16px;  
        }  
        
        .box form button {  
            background-color: #4CAF50;  
            color: #fff;  
            border: none;  
            padding: 12px 16px;  
            border-radius: 3px;  
            cursor: pointer;  
            width: 100%;  
            font-size: 14px;  
            font-weight: bold;  
            transition: background-color 0.3s ease;  
        }  
        
        .box form button:hover {  
            background-color: #45a049;  
        }  
    </style>  
</head>  
<body>  
<h1>Update Employee Data</h1>   
    <div class='box'>  
        <form action="" method="post">   
            <label for="name">Name:</label>  
            <input type="text" name='name' id='name' required value="<?php echo $result['name']; ?>">  
            <br><br>  

            <label for="pos">Position:</label>  
            <input type="text" name='position' id='pos' value="<?php echo $result['position']; ?>" required>  
            <br><br>  

            <label for="dept">Department:</label>  
            <input type="text" name='department' id='dept' value="<?php echo $result['department']; ?>" required>  
            <br><br>  

            <label for="age">Age:</label>  
            <input type="number" name='age' id='age' value="<?php echo $result['age']; ?>" required>  
            <br><br>  

            <button name='submit'>  
                Save Changes  
            </button>  
        </form>  
    </div>  
</body>  
</html>