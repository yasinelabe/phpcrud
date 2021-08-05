<?php

require_once("./header.php");

// make the connection
$connection = make_connection();

if(isset($_GET['delete'])):
    $id = $_GET['delete'];  

    // delete the item
    $del_query = "DELETE FROM projects where id = $id";
    $result = mysqli_query($connection,$del_query);

    if(!$result) header("Location: read.php?error=true");
    if($result) header("Location: read.php?msg=success");
endif;

// create the query
$query = "SELECT * FROM projects";

// run the query and get the result
$result = mysqli_query($connection, $query);
?>

<body>
    <div class="container">
        <table class="table table-bordered table-responsive mt-3">
            <thead>
                <tr>
                    <th colspan="4"><a href="create.php">Add new project</a></th>
                </tr>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>PROEJECT NAME</th>
                    <th>BUDGET</th>
                    <th>DEADLINE</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php while ($row = mysqli_fetch_object($result)): ?>

                <tr>
                    <td><?php echo $row->id;?></td>
                    <td><?php echo $row->project_name;?></td>
                    <td><?php echo $row->budget;?></td>
                    <td><?php echo $row->deadline;?></td>
                    <td>
                        <a href="read.php?delete=<?php echo $row->id;?>" class="text-danger">delete</a> | 
                        <a href="update.php?id=<?php echo $row->id;?>" class="text-success">update</a>
                    </td>
                </tr>

                <?php endwhile;?>
            </tbody>
        </table>
    </div>
</body>

</html>