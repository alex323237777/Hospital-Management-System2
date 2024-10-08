<?php
session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php"); // uses login page to see which patient is logged in //
    exit();
}

$patient_id = $_SESSION['user']; 

$db = new SQLite3('SoftwareProjDB.db');

$query = $db->prepare("SELECT * FROM Appointment WHERE patient_id = :patient_id");
$query->bindValue(':patient_id', $patient_id, SQLITE3_TEXT); // only show the records of the patient who is logged in //
$result = $query->execute();

$appointments = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $appointments[] = $row;
}
?>
<a href="patient_dashboard.php" class="back-to-home-button">Back to Home</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
<div class="container">
<div class ="dashboard-title">
    <h2>View Appointments</h2>
    </div>
    <p>List of upcoming Appointments:</p>
    <div class="content-box">
        <?php foreach ($appointments as $appointment): ?>
            <div class="record-box">
                <p><strong>Appointment ID:</strong> <?php echo $appointment['appointment_id']; ?></p>
                <p><strong>Date:</strong> <?php echo $appointment['appointment_date']; ?></p>
                <p><strong>Time:</strong> <?php echo $appointment['appointment_time']; ?></p>
                <p><strong>Location:</strong> <?php echo $appointment['appointment_location']; ?></p>
                <p><strong>Doctor ID:</strong> <?php echo $appointment['doctor_id']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>