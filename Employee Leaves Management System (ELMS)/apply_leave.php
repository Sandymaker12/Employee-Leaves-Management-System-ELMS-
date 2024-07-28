<?php
include 'db.php';
session_start();

if (!isset($_SESSION['employee_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee_id = $_SESSION['employee_id'];
    $leave_type = $_POST['leave_type'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "INSERT INTO leaves (employee_id, leave_type, start_date, end_date) VALUES ('$employee_id', '$leave_type', '$start_date', '$end_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Leave application submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<form method="POST">
    Leave Type: <input type="text" name="leave_type" required><br>
    Start Date: <input type="date" name="start_date" required><br>
    End Date: <input type="date" name="end_date" required><br>
    <input type="submit" value="Apply">
</form>
