<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$doctor_id = $_SESSION['user']; 

$db = new SQLite3('SoftwareProjDB.db');

if(isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search']; // assigns variables for the search function //
    $query = $db->prepare("SELECT * FROM Appointment WHERE doctor_id = :doctor_id AND patient_id = :search"); // selects records for doctor that is logged in and the patient that has been searched for //
    $query->bindValue(':doctor_id', $doctor_id, SQLITE3_TEXT);
    $query->bindValue(':search', $search, SQLITE3_TEXT); 
} else {
    $query = $db->prepare("SELECT * FROM Appointment WHERE doctor_id = :doctor_id");
    $query->bindValue(':doctor_id', $doctor_id, SQLITE3_TEXT); // selects records only for the doctor who is logged in //
}

$result = $query->execute();

$appointments = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $appointments[] = $row;
}
?>
<a href="doctor_dashboard.php" class="back-to-home-button">Back to Home</a>
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
                <p><strong>Patient ID:</strong> <?php echo $appointment['patient_id']; ?></p>
                <div class="option-buttons">
                        <a href="update_appointments.php?id=<?php echo $appointment['appointment_id']; ?>" class="search-button">Update</a>
                        <a href="delete_appointment.php?id=<?php echo $appointment['appointment_id']; ?>" class="search-button">Delete</a>
                    </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>