<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple To-Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 80px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        h2 {
            margin-top: 30px;
            color: #333;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 90%; /* Adjust this to be smaller than the table's width */
            margin: 0 auto 30px auto; /* Center the card and add bottom margin */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:last-child td {
            border-bottom: none;
        }

        input[type="text"],
        textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Simple To-Do List</h1>
        
        <!-- Add Task Form in Card Format -->
        <div class="card">
            <h2>Add New Task</h2>
            <form action="add_task.php" method="POST">
                <input type="text" name="task_name" placeholder="Enter task name" required>
                <textarea name="task_description" placeholder="Enter task description"></textarea>
                <button type="submit">Add Task</button>
            </form>
        </div>

        <!-- Display tasks -->
        <table>
            <tr>
                <th>Task Name</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = "SELECT id, task_name FROM tasks";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["task_name"] . "</td><td><a href='edit_task.php?id=".$row["id"]."'>Edit</a> | <a href='delete_task.php?id=".$row["id"]."'>Delete</a></td></tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No tasks yet</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
