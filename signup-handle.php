<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "TODO_APP";
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    echo "connection failed";
} else {
    echo "connection established";
}

$name = $_POST['username'];
$email = $_POST['emailaddress'];
$password = $_POST['password'];
$designation = $_POST['designation'];
$department = $_POST['dept'];
$joining_date = $_POST['jd'];

$check_query = "SELECT * FROM `signup` WHERE `email`='$email'";
$result = mysqli_query($conn, $check_query);
if ($result->num_rows > 0) {
    header("Location:landingpage.php?message=user_exists");
    exit();
} else {
    $insert_query = "INSERT INTO `signup`(`name`,`email`,`password`,`designation`,`department`,`joining_date`)
    VALUES('$name','$email','$password','$designation','$department','$joining_date')";
    if (mysqli_query($conn, $insert_query) === true) {
        $task_table_name = str_replace(['@','.'],[ '_',''], $email) . "_tasks";
        $create_table_query = "CREATE TABLE `$task_table_name`(
            `task_id` INT(6)  AUTO_INCREMENT PRIMARY KEY,
            `task_name` VARCHAR(50),
            `task_description` TEXT NOT NULL,
            `task_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `user_email` VARCHAR(20),
            FOREIGN KEY (`user_email`) REFERENCES `signup`(`email`) ON DELETE CASCADE
        )";
        if (mysqli_query($conn, $create_table_query) === true) {
            header("Location: task_manager.php?message=signup_success");
            exit();
        } else {
            echo "error creating table  ".$conn->error;
        }
    } else {
        echo "error inserting record";
    }
}
