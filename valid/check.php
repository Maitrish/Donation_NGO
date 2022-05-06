<?php
include "security/db.php";

$errors = array(); 

//  Email Validation 
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
        header("Location: newUser.php");
    }
}


//  Validate OTP
// if (isset($_POST['validate'])) {
//     require_once "otpChecker.php";
//     if($id>0){
        
//         echo "<script>console.log('Get Id is: " . $id . "');</script>";
//     }
//     else {
//         echo "<script>console.log('Get Id not found!');</script>";
//     }
    
//     $otpInput = mysqli_real_escape_string($db, $_POST['otpInput']);

//     if (count($errors) == 0) {
//         $query = "SELECT * FROM `donar_master` WHERE `id`=$id AND `otp`=$otpInput";
//         $results = mysqli_query($db, $query);

//         if (mysqli_num_rows($results) == 1) {
            
//             header('location: test.php');
//         }else {
//             array_push($errors, "Wrong OTP");
//             header('location: test1.php');
//         }
//     }
// }


// Check Email for Sending OTP
if (isset($_POST['verify'])) {
    
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $sql = "SELECT * FROM `donar_master` WHERE `email`='$email'";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            echo "<script>console.log('Id is: " . $id . "' );</script>";
        }
        // $otp = rand(11111,99999);
        // $s="UPDATE `donar_master` SET `otp`=$otp,`is_verified` = 'Y' WHERE `id`=$id";
        // mysqli_query($db, $s);
        // header("Location: otpChecker.php?userId=$id");
        header("Location: otpChecker.php?userId=$id");
    } else {
        header("Location: test1.php");
    }
}

//  Register new user
if (isset($_POST['reg'])) {
    // receive all input values from the form
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $note = mysqli_real_escape_string($db, $_POST['note']);
    $ammount = mysqli_real_escape_string($db, $_POST['ammount']);
    $otp = 0;
    $is_verified = "N";
    
    $q = "SELECT * FROM `donar_master` WHERE email='$email'";
    $res = mysqli_query($db, $q);
    if (mysqli_num_rows($res) > 0) {
        $errors['email'] = "Email already taken";
        echo "<script>alert('Email aleady taken!');</script>";
        header("Location: newUser.php");
    } else {
        $query = "INSERT INTO `donar_master` (first_name, last_name, email, phone, country, address, note, ammount, otp, is_verified) 
					  VALUES('$first_name','$last_name', '$email', '$phone', '$country', '$address', '$note', '$ammount', '$otp', '$is_verified')";
	    mysqli_query($db, $query);
        
        header("Location: test.php");
    }
}

?>