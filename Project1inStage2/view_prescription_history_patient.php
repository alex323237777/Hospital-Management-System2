<?php
session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");
    exit();
}

$patient_id = $_SESSION['user']; 

$db = new SQLite3('SoftwareProjDB.db');

$query = $db->prepare("SELECT * FROM Prescription WHERE patient_id = :patient_id");
$query->bindValue(':patient_id', $patient_id, SQLITE3_TEXT); // only shows for patient that is logged in //
$result = $query->execute();

$prescriptions = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $prescriptions[] = $row;
}
?>
<a href="patient_dashboard.php" class="back-to-home-button">Back to Home</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Prescriptions</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
<div class="container">
<div class ="dashboard-title">
    <h2>View Prescriptions</h2>
    </div>
    <p>List of previous Prescriptions:</p>
    <div class="content-box">
        <?php foreach ($prescriptions as $prescription): ?>
            <div class="record-box">
                <p><strong>Prescription ID:</strong> <?php echo $prescription['prescription_id']; ?></p>
                <p><strong>Medication Name:</strong> <?php echo $prescription['medication_name']; ?></p>
                <p><strong>Medication Dosage:</strong> <?php echo $prescription['medication_dosage']; ?></p>
                <p><strong>Date Prescribed:</strong> <?php echo $prescription['date_prescriped']; ?></p>
                <p><strong>Doctor ID:</strong> <?php echo $prescription['doctor_id']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>