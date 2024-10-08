<a href="doctor_dashboard.php" class="back-to-home-button">Back to Home</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnose Patient</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container">
        <div class="dashboard-title">
            <h2>Diagnose Patient</h2>
        </div>
        <p>Please fill in the form below:</p>
        <div class="content-box diagnose-form">
            <p>Update a Patient's Diagnosis:</p>
            <form method="post" action="diagnose_patient_process.php">
                <div class="form-group">
                    <label for="patient_id">Patient ID:</label>
                    <input type="text" id="patient_id" name="patient_id" required class="input-field">
                </div>
                <div class="form-group">
                    <label for="diagnosis">Diagnosis:</label>
                    <input type="text" id="diagnosis" name="diagnosis" required class="input-field">
                </div>
                <button type="submit" class="user-button">Diagnose</button>
            </form>
        </div>
    </div>
</body>
</html>
