<?php

$db = new SQLite3('SoftwareProjDB.db'); //connects to the database//

if (!$db) {
    die("Failed to connect to the database.");//message if connection fails//
}


if ($_SERVER["REQUEST_METHOD"] == "POST") { //assigns code values to all items in the creation process//
    
    $date = $_POST["date"];
    $time = $_POST["time"];
    $location = $_POST["location"];
    $doctor_id = $_POST["doctor_id"];
    $patient_id = $_POST["patient_id"];

    
    $appointment_id = ""; //assigns empty value to assignment id as new ones are being generated//
    $last_id_query = $db->query("SELECT MAX(appointment_id) as max_id FROM appointment"); //selects the most recent(maximum) id from the appointment table//
    $last_id_row = $last_id_query->fetchArray(SQLITE3_ASSOC);
    if ($last_id_row) {
        $last_id = $last_id_row["max_id"]; //adds one to the max id to create a new appointment id//
        $appointment_id = $last_id + 1; //this process continues for each future entry in the table//
    } else {
        $appointment_id = 1; 
    }

    $insert_query = $db->prepare("INSERT INTO appointment (appointment_id, appointment_date, appointment_time, appointment_location, doctor_id, patient_id) VALUES (:appointment_id, :date, :time, :location, :doctor_id, :patient_id)");
    $insert_query->bindValue(':appointment_id', $appointment_id); //line of code above assigns values from the database to the ones I have created in the code//
    $insert_query->bindValue(':date', $date);
    $insert_query->bindValue(':time', $time);
    $insert_query->bindValue(':location', $location);
    $insert_query->bindValue(':doctor_id', $doctor_id);
    $insert_query->bindValue(':patient_id', $patient_id);
    $insert_query->execute();

    
    header("Location: doctor_dashboard.php"); //Once appointment is created, user is sent back to the dashboard//
    exit();
}
?>