<?php  

require_once './include/connection.php';  

$query = "SELECT * FROM employee";  
$stmt = $conn->prepare($query);  
$stmt->execute();  
$results = $stmt->fetchAll();  

if (isset($_POST['submit'])) {  
    $name = $_POST['name'];  
    $position = $_POST['position'];  
    $department = $_POST['department'];  
    $age = $_POST['age'];  

    $query = "INSERT INTO employee (name, position, department, age) VALUES (:name, :position, :department, :age)";  
    $stmt = $conn->prepare($query);  
    $stmt->bindParam(':name', $name);  
    $stmt->bindParam(':position', $position);  
    $stmt->bindParam(':department', $department);  
    $stmt->bindParam(':age', $age);  
    $stmt->execute();  

    echo 'Insertion Successful';
    header("location:./index.php") ;
    
    }  
?>  

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Document</title>  
    <link rel="stylesheet" href='./style.css'>  
</head>  
<body>  

<div class="box">  
    <div>
        <form action="" method="post"> 
            <h3>Employee Form</h3> 
            <label for="name">Name:</label>  
            <input type="text" name='name' id='name' required>  
            <br><br>  

            <label for="pos">Position:</label>  
            <input type="text" name='position' id='pos' required>  
            <br><br>  

            <label for="dept">Department:</label>  
            <input type="text" name='department' id='dept' required>  
            <br><br>  

            <label for="age">Age:</label>  
            <input type="number" name='age' id='age' required>  
            <br><br>  

            <button name='submit'>  
                Submit  
            </button>  
        </form>  
    </div>
    <div class="main">  
        <table>  
            <caption>Employee Table</caption>  

            <thead>  
                <tr>  
                    <td>ID</td>  
                    <td>Name</td>  
                    <td>Position</td>  
                    <td>Department</td>  
                    <td>Age</td> 
                    <td>Action</td>
                
            </thead>  
            <tbody>  
                <?php
                $id=0; 
                foreach ($results as $employee) {
                    $id++ ?>  
                <tr>  
                    <td><?php echo $id; ?></td>  
                    <td><?php echo $employee['name']; ?></td>  
                    <td><?php echo $employee['position']; ?></td>  
                    <td><?php echo $employee['department']; ?></td>  
                    <td><?php echo $employee['age']; ?></td>  
                    <td>
                        <a href="./update.php?id=<?php echo $employee['ID']; ?>"><button id='edit'>Edit</button></a>
                        ~
                        <a href="./delete.php?id=<?php echo $employee['ID']; ?>"><button id='del'>Delete</button></a>
                    </td>
                </tr>  
                <?php } ?>  
            </tbody>  
        </table>  
    </div>  

</body>  
</html>
