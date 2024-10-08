<a href="login.php" class="back-to-home-button">Back to login</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse Dashboard</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container">
    <div class="dashboard-title">
            <h2>Nurse Dashboard</h2>
        </div>
        <p>Please chose an option from below:</p>
        <div class="dashboard-content">
            <div class="dashboard-options">
                <a href="create_appointments_nurse.php" class="dashboard-option">Create Appointments</a>
                <a href="view_appointments_nurse.php" class="dashboard-option">View Appointments</a>
                <a href="view_patient_history.php" class="dashboard-option">View Prescription History</a>
            </div>
            <div class="tasks-container">
                <h3>Tasks for Today</h3>
                <div class="tasks-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Team Meeting</td>
                                <td>9:15 AM</td>
                            </tr>
                            <tr>
                                <td>Appointment in Bowens Suite</td>
                                <td>11:15 AM</td>
                            </tr>
                            <tr>
                                <td>Lunch Break</td>
                                <td>1:00 PM</td>
                            </tr>
                            <tr>
                                <td>Break Ends</td>
                                <td>2:00 PM</td>
                            </tr>
                            <tr>
                                <td>End of Shift</td>
                                <td>5:15 PM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>