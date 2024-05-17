<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "TODO_APP";
$conn = mysqli_connect($servername, $username, $password, $db);
$insert = false;
$update = false;
$delete = false;
if (!$conn) {
    echo "connection failed";
} else {
    echo "connection established";
}
session_start();
$task_table_name = str_replace(['@', '.'], ['_', ''], $_SESSION['email']) . "_tasks";
//echo  $_SESSION['email']."  ". $_SESSION['password'];
if (isset($_GET['delete'])) {
    $task_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `$task_table_name` WHERE `task_id`=$task_id";
    $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {
        $task_id = $_POST['snoEdit'];
        $task_name = $_POST['titleEdit'];
        $task_description = $_POST['descEdit'];
        $sql = "UPDATE `$task_table_name` SET `task_name`= '$task_name' , `task_description` = '$task_description' WHERE `$task_table_name`.`task_id` = $task_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $update = true;
        }
    }
} else {
    $task_name = $_POST["title"];
    $task_description = $_POST["desc"];

    $sql = "INSERT INTO `$task_table_name` (`task_name`,`task_description`) VALUES ('$task_name','$task_description')";
    $result = mysqli_query($conn, $sql);
    if ($result) {   //echo "note inserted";
        $insert = true;
    } else {
        echo "not inserted successfully because " . mysqli_error($connection);
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>TASK MANAGER</title>

</head>

<body>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action=" " method="post">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <!-- <h2>Add a Note</h2> -->
                        <div class="form-group">
                            <label for="title">Task Name</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="notetitle">
                        </div>
                        <div class="mb-4">
                            <label for="desc">Task Description</label>
                            <textarea class="form-control" id="descEdit" name="descEdit" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Task</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PHP CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <?php
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Note Saved</strong> refer it whenever you need.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    ?>

    <?php
    if ($delete) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>deleted successfully</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    ?>

    <?php
    if ($update) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>updated successfully</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    ?>

    <div class="container my-4">
        <form action="/TODO_APP_PROJECT/task_manager.php" method="post">
            <h2>Add a Task</h2>
            <div class="form-group">
                <label for="title">Task name</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="notetitle">
            </div>
            <div class="mb-4">
                <label for="desc">Task Description</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add Task</button>
        </form>
    </div>

    <div class="container my-4">

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `$task_table_name`";
                $result = mysqli_query($conn, $sql);
                $sno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;
                    echo "<tr>
                            <th scope='row'>" . $sno . "</th>
                            <td>" . $row['task_name'] . "</td>
                            <td>" . $row['task_description'] . "</td>
                            <td><button class='edit btn btn-sm btn-primary' id=" . $row['task_id'] . ">Edit</button> <button class='delete btn btn-sm btn-primary' id=d" . $row['task_id'] . ">delete</button>
                            </td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <hr>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- include this into our project todo app  -->
    <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        edits=document.getElementsByClassName('edit');
        Array.from(edits).forEach((element)=>{
            element.addEventListener("click",(e)=>{
                console.log("edit ",);
                tr=e.target.parentNode.parentNode;
                title=tr.getElementsByTagName("td")[0].innerText;
                description=tr.getElementsByTagName("td")[1].innerText;
                titleEdit.value=title;
                descEdit.value=description;
                snoEdit.value=e.target.id;
                console.log(e.target.id);
                $('#editModal').modal('toggle');
            })
        })

        deletes=document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element)=>{
            element.addEventListener("click",(e)=>{
                console.log("edit ",);
                tr=e.target.parentNode.parentNode;
                title=tr.getElementsByTagName("td")[0].innerText;
                description=tr.getElementsByTagName("td")[1].innerText;
                sno=e.target.id.substr(1,);
                if(confirm("are you sure you want to delete this note")){
                    console.log("yes");
                    window.location=`/task_manager.php?delete=${sno}`;
                }
                else{
                    console.log("no");
                }
            })
        })
    </script>

</body>

</html>

