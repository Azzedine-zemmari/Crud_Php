    
    <?php
    include('./header.php');
    include('./connection.php');
    ?>
    <div class="container">
        <table class="table table-hover table-bordered table-striped">
            <div style="display: flex; justify-content:space-between; margin:20px"  >
                <h2 style="text-transform:upperCase;">All Students</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Student</button>
    
            </div>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>AGE</th>
                    <th>UPDATE</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM `students`";
                $result = mysqli_query($connection,$query);

                if(!$result){
                    die('query_failed'.mysqli_error());
                }
                else{
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?= $row['id']?></td>
                            <td><?= $row['firstName']?></td>
                            <td><?= $row['lastName']?></td>
                            <td><?= $row['age']?></td>
                            <td><a href="./update_page.php?id=<?= $row['id']?>" class="btn btn-success">UPDATE</a></td>
                            <td><a href="./delete_page.php?id=<?= $row['id']?>"  class="btn btn-danger">DELETE</a></td>                        
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <form action="./insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ADD STUDENTS</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="f_name">First Name</label>
                        <input type="text" name="f_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="l_name">Last Name</label>
                        <input type="text" name="l_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" name="age" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add-student" value="Add"/>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
include('./footer.php');
?>