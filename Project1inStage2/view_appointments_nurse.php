<?php

$db = new SQLite3('SoftwareProjDB.db'); //connects to the database//

if(isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $query = $db->prepare("SELECT * FROM Appointment WHERE patient_id = :search"); // shows records only for the patient that has been searched for //
    $query->bindValue(':search', $search, SQLITE3_TEXT); 
} else {
    $query = $db->prepare("SELECT * FROM Appointment"); // otherwise select all records //
}

$result = $query->execute();

$appointments = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $appointments[] = $row;
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
    <h2>View Appointments</h2>
    </div>
    <p>List of upcoming Appointments:</p>
    <div class="content-box">
        <form action="" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search by Patient ID" class="search-input">
            <button type="submit" class="search-button">Search</button>
        </form>
        <?php foreach ($appointments as $appointment): ?>
            <div class="record-box">
                <p><strong>Appointment ID:</strong> <?php echo $appointment['appointment_id']; ?></p>
                <p><strong>Date:</strong> <?php echo $appointment['appointment_date']; ?></p>
                <p><strong>Time:</strong> <?php echo $appointment['appointment_time']; ?></p>
                <p><strong>Location:</strong> <?php echo $appointment['appointment_location']; ?></p>
                <p><strong>Doctor ID:</strong> <?php echo $appointment['doctor_id']; ?></p>
                <p><strong>Patient ID:</strong> <?php echo $appointment['patient_id']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>