<a href="login.php" class="back-to-home-button">Back to login</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container">
    <div class="dashboard-title">
            <h2>Patient Dashboard</h2>
        </div>
        <p>Please chose an option from below:</p>
        <div class="dashboard-content">
            <div class="dashboard-options">
                <a href="appointment_message.php" class="dashboard-option">Requests Appointments</a>
                <a href="view_appointments_patient.php" class="dashboard-option">View Appointments</a>
                <a href="prescription_message.php" class="dashboard-option">Request Prescriptions</a>
                <a href="view_prescription_history_patient.php" class="dashboard-option">View Prescriptions</a>
            </div>
            <div class="tasks-container">
                <h3>Upcoming Events</h3>
                <div class="tasks-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Standard Check Up</td>
                                <td>11/04/24, 09:30 AM</td>
                            </tr>
                            <tr>
                                <td>Appointment in Jackson Suite</td>
                                <td>29/04/24, 11:20 AM</td>
                            </tr>
                            <tr>
                                <td>Prescription Ready to collect</td>
                                <td>01/05/24</td>
                            </tr>
                            <tr>
                                <td>Hospital daily opening time</td>
                                <td>8:00 AM</td>
                            </tr>
                            <tr>
                                <td>Hospital daily closing time</td>
                                <td>8:00 PM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>