<?php
include 'db.php';
session_start();

if (!isset($_SESSION['employee_id'])) {
    header("Location: login.php");
    exit();
}

$employee_id = $_SESSION['employee_id'];
$sql = "SELECT * FROM leaves WHERE employee_id='$employee_id'";
$result = $conn->query($sql);
?>

<h1>Leave Applications</h1>

<a href="apply_leave.php">Apply for Leave</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Leave Type</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Status</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['leave_type']; ?></td>
        <td><?php echo $row['start_date']; ?></td>
        <td><?php echo $row['end_date']; ?></td>
        <td><?php echo $row['status']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<?php $conn->close(); ?>
