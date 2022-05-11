<?php
include "security/db.php";
include "security/constant.php";


//  Email Validation 
if (isset($_POST['donate_Now'])) {
    $flag = 0;
    $totalAmmount = 0;
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $ammount = mysqli_real_escape_string($db, $_POST['ammount']);
    $noteNew = mysqli_real_escape_string($db, $_POST['note']);
    $sql = "SELECT * FROM donar_master WHERE email='$email'";
    if ($result=mysqli_query($db,$sql)) {
        $rowcount=mysqli_num_rows($result);
    }
    if ($rowcount>=1) {
        $flag = 1;
        // header("Location: test.php");
    }
    else {
        $flag = 0;
        // header("Location: newUser.php");
    }
    // For old user
    if($flag == 1){
        $sql = "SELECT * FROM `donar_master` WHERE `email`='$email'";
        $result = mysqli_query($db,$sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $amm = $row['ammount'];
                break;
            }
            $qAmmount = "INSERT INTO `ammount` (d_id, phone, ammount, note) 
					  VALUES('$id','$phone','$ammount', '$noteNew')";
            mysqli_query($db, $qAmmount);
            $totalAmmount = $amm + $ammount;
            $otp = rand(11111,99999);
            $s="UPDATE `donar_master` SET `phone`='$phone' , `note`='$noteNew',`ammount`=$totalAmmount,`otp`=$otp WHERE `id`=$id";
            mysqli_query($db, $s);
	        $_SESSION["login"] = "OK";
            header("Location: otpCheckerDonation.php?userId=$id");
        }
    } else {
        $_SESSION["login"] = "OK";
        header("Location: newUser.php");
    }
}

// Sending OTP
if (isset($_POST['verify'])) {
    
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $sql = "SELECT * FROM `donar_master` WHERE `email`='$email'";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            break;
        }
        $otp = rand(11111,99999);
        
        //Sending mail
        
        //Sending mail end

        $s="UPDATE `donar_master` SET `otp`=$otp,`is_verified` = 'Y' WHERE `id`=$id";
        mysqli_query($db, $s);
        $_SESSION["login"] = "OK";
        header("Location: otpChecker.php?userId=$id");
    } else {
        header("Location: test1.php");
    }
}

//  Register new user
if (isset($_POST['reg'])) {
    // receive all input values from the form
    $flag = 0;
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $note = mysqli_real_escape_string($db, $_POST['note']);
    $ammount = mysqli_real_escape_string($db, $_POST['ammount']);
    $otp = 0;
    $is_active = "Y";
    
    $q = "SELECT * FROM `donar_master` WHERE email='$email'";
    $res = mysqli_query($db, $q);
    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('Email aleady taken!');</script>";
        header("Location: newUser.php");
    } else {
        $query = "INSERT INTO `donar_master` (first_name, last_name, email, phone, country, address, note, ammount, otp, is_active) 
					  VALUES('$first_name','$last_name', '$email', '$phone', '$country', '$address', '$note', $ammount, '$otp', '$is_active')";
	    mysqli_query($db, $query);
        
        
        $flag = 1;  
    }
    // If all data is new
    if($flag == 1){
        $sql = "SELECT * FROM `donar_master` WHERE `email`='$email'";
        $result = mysqli_query($db,$sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $amm = $row['ammount'];
                $no = $row['note'];
                break;
            }
            $qAmmount = "INSERT INTO `ammount` (d_id, phone, ammount, note) 
					  VALUES('$id','$phone','$amm', '$no')";
	        mysqli_query($db, $qAmmount);
            $otp = rand(11111,99999);
            $s="UPDATE `donar_master` SET `otp`=$otp WHERE `id`=$id";
            mysqli_query($db, $s);

            header("Location: otpCheckerDonNew.php?userId=$id");
        }
    } else {
        header("Location: newUser.php");
    }
}

?>