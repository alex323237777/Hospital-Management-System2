<?php
session_start();

$db = new SQLite3('SoftwareProjDB.db');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $roleId = $_POST['role_id'];

    switch ($roleId) {  //different case for each of the 4 users//
        case 701: //each role id relates to a case//
            $table = 'Doctor';
            $usernameColumn = 'doctor_id';
            $passwordColumn = 'doctor_password';
            break;
        case 702: 
            $table = 'Nurse';
            $usernameColumn = 'nurse_id';
            $passwordColumn = 'nurse_password';
            break;
        case 703: 
            $table = 'Patient';
            $usernameColumn = 'patient_id';
            $passwordColumn = 'patient_password';
            break;
        case 704: 
            $table = 'Pharmacist';
            $usernameColumn = 'pharmacist_id';
            $passwordColumn = 'pharmacist_password';
            break;
        default:
            $error = "Invalid role ID. Please try again."; //system only accepts the 4 valid role ids//
            break;
    }

    if (isset($table)) {
        $statement = $db->prepare("SELECT * FROM $table WHERE $usernameColumn = :username");
        $statement->bindValue(':username', $username); // validates username based on which user is logging in //
        $result = $statement->execute();

        if ($row = $result->fetchArray()) {  
            if ($row[$passwordColumn] == $password) { // moves onto to validating password if username is correct //
                $_SESSION['user'] = $username;
                switch ($roleId) {
                    case 701: // sends user to appropriate dashboard based on role id //
                        header('Location: doctor_dashboard.php');
                        exit();
                    case 702:
                        header('Location: nurse_dashboard.php');
                        exit();
                    case 703:
                        header('Location: patient_dashboard.php');
                        exit();
                    case 704:
                        header('Location: pharmacist_dashboard.php');
                        exit();
                }
            } else {
                
                $error = "Incorrect password. Please try again.";
            }
        } else { // error messages for username and password //
            
            $error = "Invalid username. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="loginstyles.css">
</head>
<body>
    <div class="container">
        <div class="left-side"></div>
        <div class="right-side">
        <h2>Sign In</h2>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input class="input-field" type="text" id="username" name="username" required><br><br>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="input-field" type="password" id="password" name="password" required><br><br>
                </div>
                <div class="form-group">
                    <label for="role_id">Role ID:</label>
                    <input class="input-field" type="text" id="role_id" name="role_id" required><br><br>
                </div>
                <?php if (isset($error)) { ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php } ?>
                <button type="submit" class="submit-btn">Login</button><br>
            </form>
        </div>
    </div>
</body>
</html>