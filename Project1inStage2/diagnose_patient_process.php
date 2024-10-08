<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST["patient_id"];
    $diagnosis = $_POST["diagnosis"];

    $db = new SQLite3('SoftwareProjDB.db'); //connects to the database//

    $check_query = $db->querySingle("SELECT COUNT(*) FROM Patient WHERE patient_id = '$patient_id'");
    if ($check_query > 0) { //Selects specific patient based on the id input//
        
        $update_query = "UPDATE Patient SET patient_diagnosis = :diagnosis WHERE patient_id = :patient_id";
        $stmt = $db->prepare($update_query); //Updates message for that patient, with most recent message//
        $stmt->bindValue(':diagnosis', $diagnosis);
        $stmt->bindValue(':patient_id', $patient_id);
        $stmt->execute();
        echo "Diagnosis updated successfully for patient ID: $patient_id"; //success message shown after submission//
    } else {
        echo "Patient ID not found. Please re-enter the data."; //error message if invalid id is input//
    }
}
?>