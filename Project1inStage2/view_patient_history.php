<?php

$db = new SQLite3('SoftwareProjDB.db'); //connects to the database//

if(isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $query = $db->prepare("SELECT * FROM Prescription WHERE patient_id = :search");
    $query->bindValue(':search', $search, SQLITE3_TEXT); // only shows for patient that has been searched up //
} else {
    $query = $db->prepare("SELECT * FROM Prescription"); // otherwise shows all records //
}

$result = $query->execute();

$prescriptions = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $prescriptions[] = $row;
}

?>
<a href="nurse_dashboard.php" class="back-to-home-button">Back to Home</a>
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
    <h2>View Prescriptions</h2>
    </div>
    <p>Patient Prescription History::</p>
    <div class="content-box">
        <form action="" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search by Patient ID" class="search-input">
            <button type="submit" class="search-button">Search</button>
        </form>
        <?php foreach ($prescriptions as $prescription): ?>
            <div class="record-box">
                <p><strong>Prescription ID:</strong> <?php echo $prescription['prescription_id']; ?></p>
                <p><strong>Medication Name:</strong> <?php echo $prescription['medication_name']; ?></p>
                <p><strong>Medication Dosage:</strong> <?php echo $prescription['medication_dosage']; ?></p>
                <p><strong>Date Prescribed:</strong> <?php echo $prescription['date_prescriped']; ?></p>
                <p><strong>Doctor ID:</strong> <?php echo $prescription['doctor_id']; ?></p>
                <p><strong>Patient ID:</strong> <?php echo $prescription['patient_id']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>