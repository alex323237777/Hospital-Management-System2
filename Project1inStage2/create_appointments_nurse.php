<a href="nurse_dashboard.php" class="back-to-home-button">Back to Home</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Appointments</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container">
    <div class ="dashboard-title">
    <h2>Create Appointments</h2>
    </div>
    <p>Fill in the form to create a new appointment:</p>
        <div class="content-box">
        <form action="create_appointment_process.php" method="post">
            <div class="form-group">
                <label for="date">Appointment Date:</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="time">Appointment Time:</label>
                <input type="time" id="time" name="time" required>
            </div>
            <div class="form-group">
                <label for="location">Appointment Location:</label>
                <input type="text" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="doctor_id">Doctor ID:</label>
                <input type="text" id="doctor_id" name="doctor_id" required>
            </div>
            <div class="form-group">
                <label for="patient_id">Patient ID:</label>
                <input type="text" id="patient_id" name="patient_id" required>
            </div>
            <button type="submit" class="submit-button">Create Appointment</button>
        </form>
        </div>
    </div>
</body>
</html>