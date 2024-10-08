<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST["patient_id"];
    $message = $_POST["message"];

    $db = new SQLite3('SoftwareProjDB.db'); //connects to the database//

    $check_query = $db->querySingle("SELECT COUNT(*) FROM Patient WHERE patient_id = '$patient_id'");
    if ($check_query > 0) { //selects the specific patient id from the database//
        
        $update_query = "UPDATE Patient SET pre_message = :message WHERE patient_id = :patient_id";
        $stmt = $db->prepare($update_query); //updates message based on specific id input//
        $stmt->bindValue(':message', $message);
        $stmt->bindValue(':patient_id', $patient_id);
        $stmt->execute();
        echo "Message updated successfully for patient ID: $patient_id"; //success message once submission is complete//
    } else {
        echo "Patient ID not found. Please re-enter the data."; //error message if incorrect details are input//
    }
}
?>