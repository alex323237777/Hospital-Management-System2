<a href="patient_dashboard.php" class="back-to-home-button">Back to Home</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Prescription</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container">
        <div class="dashboard-title">
            <h2>Request Prescription</h2>
        </div>
        <p>Please fill in the form below:</p>
        <div class="content-box diagnose-form">
            <p>Send a Request Message to the Pharmacists:</p>
            <form method="post" action="prescription_message_process.php">
                <div class="form-group">
                    <label for="patient_id">Patient ID:</label>
                    <input type="text" id="patient_id" name="patient_id" required class="input-field">
                </div>
                <div class="form-group">
                    <label for="diagnosis">Message:</label>
                    <input type="text" id="message" name="message" required class="input-field">
                </div>
                <button type="submit" class="user-button">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
