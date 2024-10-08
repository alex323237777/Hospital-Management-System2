<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST["patient_id"]; 
    $message = $_POST["message"];

    $db = new SQLite3('SoftwareProjDB.db'); //connect to the database//

    $check_query = $db->querySingle("SELECT COUNT(*) FROM Patient WHERE patient_id = '$patient_id'"); //Selects the specific patient based on their unique id//
    if ($check_query > 0) {
        
        $update_query = "UPDATE Patient SET app_message = :message WHERE patient_id = :patient_id"; //Updates to the most recent message that has been input//
        $stmt = $db->prepare($update_query);
        $stmt->bindValue(':message', $message);
        $stmt->bindValue(':patient_id', $patient_id);
        $stmt->execute();
        echo "Message updated successfully for patient ID: $patient_id"; //Displays success message after input//
    } else {
        echo "Patient ID not found. Please re-enter the data."; //Error message if invalid id is input//
    }
}
?>