<?php
include './connection.php';
if(isset($_POST["add-student"])){
    $fname = $_POST["f_name"];
    $Lname = $_POST["l_name"];
    $Age = $_POST["age"];

    if($fname == '' || empty($fname)){
        header('location:index.php?message=You need to fill in the first name !');
    }
    else{
        $query = "INSERT INTO `students` (`firstName`, `lastName`, `age`) VALUES ('$fname', '$Lname', '$Age')";
        $result = mysqli_query($connection,$query);
        if(!$result){
            die('Query failed'.mysqli_error());
        }
        else{
            header('location:index.php?message=You insert data succesfully');
        }
    }

}
?>