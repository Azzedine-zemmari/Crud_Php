<?php
include('./connection.php');
include('./header.php');
$StudentId = "";
if(isset($_GET['id'])){
    $StudentId = $_GET['id'];
    $query = "SELECT * FROM `students` WHERE id= $StudentId";
    $result = mysqli_query($connection,$query);
    if($result && mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $age = $row['age'];
    }
}
?>
<?php

if(isset($_POST['update-student'])){
    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }
    $firstName = $_POST['f_name'];
    $lastName = $_POST['l_name'];
    $age = $_POST['age'];

    $query = "update `students` set `firstName` = '$firstName', `lastName` = '$lastName', `age` = '$age' WHERE `id`= $idnew";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die("Query failed: " . mysqli_error());
    }
    else{
        header('location:index.php');
    }
}
?>

<div class="container mt-3">
    <form action="./update_page.php?id_new=<?= $StudentId ?> " method="post">
        <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" value="<?= $firstName ?>" class="form-control">
        </div>
        <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" value="<?= $lastName?>" class="form-control">
        </div>
        <div class="form-group">
        <label for="age">Age</label>
        <input type="text" name="age" value="<?= $age?>" class="form-control">
        </div>
        <input type="submit" class="btn btn-success mt-2" name="update-student" value="Update"/>
    </form>
</div>
<?php 
include('./footer.php');
?>