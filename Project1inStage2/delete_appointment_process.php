<?php

$db = new SQLite3('SoftwareProjDB.db'); //connects to the database//

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['confirm'])) {

        $appointment_id = $_POST['appointment_id']; //assigns value for the primary key//

        $sql = "DELETE FROM Appointment WHERE appointment_id = $appointment_id"; //finds primary key to delete that specific record//

        $result = $db->exec($sql);

        if ($result) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . $db->lastErrorMsg();
        }
    } elseif (isset($_POST['cancel'])) {

        header("Location: view_appointments.php"); //returned to view page after deletion//
        exit();
    }
}
?>