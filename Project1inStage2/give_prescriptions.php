<a href="pharmacist_dashboard.php" class="back-to-home-button">Back to Home</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Give Prescriptions</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <div class ="dashboard-title">
    <h2>Give Prescriptions</h2>
    </div>
    <p>Fill in the form to create a new prescriptions:</p>
        <div class="content-box">
        <form method="post" action="give_prescriptions_process.php">
            <div class="form-group">
            <label for="medication_name">Medication Name:</label>
            <input type="text" id="medication_name" name="medication_name" required>
            </div>
            <div class="form-group">
            <label for="medication_dosage">Medication Dosage:</label>
            <input type="text" id="medication_dosage" name="medication_dosage" required>
            </div>
            <div class="form-group">
            <label for="date_prescribed">Date Prescribed:</label>
            <input type="date" id="date_prescribed" name="date_prescribed" required>
            </div>
            <div class="form-group">
            <label for="doctor_id">Doctor ID:</label>
            <input type="text" id="doctor_id" name="doctor_id" required>
            </div>
            <div class="form-group">
            <label for="patient_id">Patient ID:</label>
            <input type="text" id="patient_id" name="patient_id" required>
            </div>
            <button type="submit">Submit</button>
        </form>
        </div>
    </div>
</body>
</html>