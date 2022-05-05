<?php
include "security/db.php";

$errors = array(); 
if (isset($_POST['donate_Now'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $sql = "SELECT * FROM donar_master WHERE email='$email'";
    if ($result=mysqli_query($db,$sql)) {
        $rowcount=mysqli_num_rows($result);
    }
    if ($rowcount>=1) {
        header("Location: test.php");
    }
    else {
        header("Location: test1.php");
    }
}

// Sending OTP
if (isset($_POST['validate'])) {
    $otpInput = mysqli_real_escape_string($db, $_POST['otpInput']);

    if (count($errors) == 0) {
        $query = "SELECT * FROM `donar_master` WHERE `id`=$id AND `otp`=$otpInput";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            
            header('location: test.php');
        }else {
            array_push($errors, "Wrong OTP");
            header('location: test1.php');
        }
    }
}

//  Validate OTP
if (isset($_POST['verify'])) {
    $otp = rand(11111,99999);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $sql = "SELECT * FROM `donar_master` WHERE `email`='$email'";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            echo "<script>console.log('Id is: " . $id . "' );</script>";
        }
        $otp = rand(11111,99999);
        $s="UPDATE `donar_master` SET `otp`=$otp,`is_verified` = 'Y' WHERE `id`=$id";
        mysqli_query($db, $s);
        header("Location: otpChecker.php?userId=$id");
    } else {
        header("Location: test1.php");
    }
}

if (isset($_POST['reg'])) {
    // $email = mysqli_real_escape_string($db, $_POST['email']);
    // $sql = "SELECT * FROM donar_master WHERE email='$email'";
    // if ($result=mysqli_query($db,$sql)) {
    //     $rowcount=mysqli_num_rows($result);
    // }
    // if ($rowcount>=1) {
    //     header("Location: test.php");
    // }
    // else {
    //     header("Location: test1.php");
    // }
}

?>