<?php

$db = new SQLite3('SoftwareProjDB.db'); //connects to the database//

if(isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $query = $db->prepare("SELECT * FROM Patient WHERE patient_id = :search");
    $query->bindValue(':search', $search, SQLITE3_TEXT); // only shows for patient that has been searched up //
} else {
    $query = $db->prepare("SELECT * FROM Patient"); // otherwise shows all records //
}

$result = $query->execute();

$notifications = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $notifications[] = $row;
}
?>
<a href="doctor_dashboard.php" class="back-to-home-button">Back to Home</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Notifications</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
<div class="container">
<div class ="dashboard-title">
    <h2>View Notifications</h2>
    </div>
    <p>Messages from Patients:</p>
    <div class="content-box">
        <form action="" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search by Patient ID" class="search-input">
            <button type="submit" class="search-button">Search</button>
        </form>
        <?php foreach ($notifications as $notification): ?>
            <div class="record-box">
                <p><strong>Patient ID:</strong> <?php echo $notification['patient_id']; ?></p>
                <p><strong>message:</strong> <?php echo $notification['app_message']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>