<?php

$db = new SQLite3('SoftwareProjDB.db'); //connects to the database//

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['confirm'])) {

        $app_id = $_POST['app_id']; //assigning values for each of the rows of the table//
        $time = $_POST['time'];
        $location = $_POST['location'];
        $date = $_POST['date'];
//updating record with Databse values linked to their assigned code values//
        $sql = "UPDATE Appointment SET appointment_time='$time', appointment_location='$location', appointment_date='$date' WHERE appointment_id=$app_id";

        $result = $db->exec($sql);

        if ($result) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . $db->lastErrorMsg(); //messages for success or failure//
        }
    } elseif (isset($_POST['cancel'])) {

        header("Location: view_appointments.php"); //returns user to view page after completion//
        exit();
    }
}
?>