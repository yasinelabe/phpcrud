<?php
require_once("./header.php");

if(isset($_POST['submit'])){
    
    $project_name = $_POST['project_name'];
    $budget = $_POST['budget'];
    $deadline = $_POST['deadline'];
    $id = $_POST['id'];

    // make connection
    $connection = make_connection();
    
    $query = "UPDATE projects set project_name = '$project_name', budget='$budget',
                deadline = '$deadline' where id = $id";

    $result = mysqli_query($connection,$query);

    if(!$result)  header("Location: update.php?id=$id&error=true");
    if($result) header("Location: read.php?msg=success");
}

if(isset($_GET['id'])):
    $id = $_GET['id'];

    $connection = make_connection();

    // soo akhri ID-ga xogtiisa 
    $query = "SELECT * FROM projects where id = $id";
    $result = mysqli_query($connection,$query);

    $row = mysqli_fetch_object($result);
?>



<body>
    <div class="container">
        <form action="update.php" method="post" class="card mt-3">
        <div class="card-header">
            <h1>Project Update Form</h1>
        </div>
        <div class="card-body ">

        <div class="form-group mb-3 ">
                <input type="text" value="<?php echo $row->project_name;?>" name="project_name"  class="form-control">
                <input type="hidden" name="id" value="<?php echo $id;?>">
            </div>

            <div class="form-group mb-3">
                <input type="text" name="budget" value="<?php echo $row->budget;?>" class="form-control">
            </div>


            <div class="form-group mb-3">
                <input type="date" value="<?php echo $row->deadline;?>" name="deadline"  class="form-control">
            </div>


            <div class="form-group mb-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Save">
            </div>
        </div>
         
        </form>
    </div>
    

    
</body>
</html>

<?php 

endif;
?>