<?php

$db = new SQLite3('SoftwareProjDB.db');

if (isset($_GET['id'])) {

    $app_id = $_GET['id'];

    $sql = "SELECT * FROM Appointment WHERE appointment_id = $app_id";

    $result = $db->querySingle($sql, true);

    if ($result) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Appointment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<div class ="dashboard-title">
    <h2>Update Appointment</h2>
    </div>
    <p>Update Details of the Appointment</Details>:</p>
    <form action="update_appointment_process.php" method="POST" class="update-form">
        <input type="hidden" name="app_id" value="<?php echo $result['appointment_id']; ?>">
        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" name="time" value="<?php echo $result['appointment_time']; ?>" class="input-field">
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" value="<?php echo $result['appointment_date']; ?>" class="input-field">
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" value="<?php echo $result['appointment_location']; ?>" class="input-field">
        </div>
        <div class="button-container">
            <input type="submit" name="confirm" value="Confirm" class="user-button">
        </div>
    </form>
</div>
</body>
</html>
<?php
    } else {
        echo "Record not found.";
    }
} else {
    echo "Department ID not provided.";
}
?>