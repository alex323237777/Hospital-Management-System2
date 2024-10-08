<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Confirmation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <div class="dashboard-title">
    <h1>Deletion Confirmation</h1>
  </div>
  <p>Are you sure you want to Delete this Record?</p>
    <form action="delete_appointment_process.php" method="POST">
        <input type="hidden" name="appointment_id" value="<?php echo $_GET['id']; ?>">
        <input type="submit" name="confirm" value="Confirm">
        <input type="submit" name="cancel" value="Cancel">
    </form>
</div>
</body>
</html>