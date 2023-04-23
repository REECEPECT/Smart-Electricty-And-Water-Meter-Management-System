<?php

$meterID = $_GET['meterid'];
//call function to get owner'a information
include "../dbhandler/dbh.class.php";
include "../models/update-user-info.model.class.php";
include "../controllers/update-user-info.contr.class.php";
$update = new UpdateContr($meterID);
$results=$update->getUserInfor($meterID);
$name = $results[0]["name"];
$email = $results[0]["email"];
$mobile = $results[0]['mobile'];
$adress= $results[0]["adress"];
$userid= $results[0]["user_id"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/update-user-info.css">
    <title>Update</title>
</head>
<body>
    <div class="container">
        <div class="title">Update Personal Information</div>
        <form action="update-user-info.inc.php?userid=<?php echo $userid ?>" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details"> Full Name</span>
                    <input type="text" name="name" value="<?php echo $name ?>">
                </div>

                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="email" value="<?php echo $email ?>">
                </div>

                <div class="input-box">
                    <span class="details">Mobile</span>
                    <input type="text" name="mobile" value="<?php echo $mobile ?>">
                </div>

                <div class="input-box">
                    <span class="details">Adress</span>
                    <input type="text" name="adress" value="<?php echo $adress ?>">
                </div>

                <div class="input-box">
                    <span class="details">New Password</span>
                    <input type="text" name="newpw" placeholder="Enter new password" required>
                </div>

                <div class="input-box">
                    <span class="details"> Confirm Password</span>
                    <input type="text" name="confirmpw" placeholder="Repeat password" required>
                </div>
                </div>
        <div class="button">
            <input type="submit" name="submit" value="Update">
            </div>
        </form>
    </div>
    
</body>
</html>