<?php

$db = new SQLite3('SoftwareProjDB.db'); //conncets to the database//

$medication_name = $_POST['medication_name'];
$medication_dosage = $_POST['medication_dosage'];
$date_prescribed = $_POST['date_prescribed'];
$doctor_id = $_POST['doctor_id'];
$patient_id = $_POST['patient_id'];

$query = $db->query("SELECT MAX(prescription_id) AS max_id FROM Prescription");
$row = $query->fetchArray();
$next_prescription_id = $row['max_id'] + 1;

$query = $db->prepare("INSERT INTO Prescription (prescription_id, medication_name, medication_dosage, date_prescriped, doctor_id, patient_id) VALUES (:prescription_id, :medication_name, :medication_dosage, :date_prescribed, :doctor_id, :patient_id)");
$query->bindParam(':prescription_id', $next_prescription_id);
$query->bindParam(':medication_name', $medication_name);
$query->bindParam(':medication_dosage', $medication_dosage);
$query->bindParam(':date_prescribed', $date_prescribed);
$query->bindParam(':doctor_id', $doctor_id);
$query->bindParam(':patient_id', $patient_id);
$query->execute();

$db->close();

header("Location: give_prescriptions.php");
exit();
?>