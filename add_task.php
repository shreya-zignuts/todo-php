<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST["task_name"];
    $task_description = $_POST["task_description"];
    $sql = "INSERT INTO tasks (task_name, task_description) VALUES ('$task_name','$task_description')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
