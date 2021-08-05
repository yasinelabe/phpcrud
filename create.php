<?php
require_once("./header.php");

if(isset($_POST) && !empty($_POST)){
    
    $project_name = $_POST['project_name'];
    $budget = $_POST['budget'];
    $deadline = $_POST['deadline'];

    // make connection
    $connection = make_connection();
    
    $query = "INSERT INTO projects(project_name,budget,deadline)
              VALUES('$project_name','$budget','$deadline')";

    $result = mysqli_query($connection,$query);

    if(!$result) die("Database Insertion failed...".mysqli_error($connection));
    header("Location: create.php?msg=success");
}

?>



<body>
    <div class="container">
        <form action="create.php" method="post" class="card mt-3">
        <div class="card-header">
            <h1>Project Creation Form</h1>
        </div>
        <div class="card-body ">

        <div class="form-group mb-3 ">
                <input type="text" name="project_name"  class="form-control">
            </div>

            <div class="form-group mb-3">
                <input type="text" name="budget"  class="form-control">
            </div>


            <div class="form-group mb-3">
                <input type="date" name="deadline"  class="form-control">
            </div>


            <div class="form-group mb-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Save">
            </div>
        </div>
         
        </form>
    </div>
    

    
</body>
</html>

