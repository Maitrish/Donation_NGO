<?php
include "security/db.php";
?>
<! DOCTYPE html>  
<html lang="en" >  
<head>  
  <meta charset="UTF-8">  
  <title> validation  
 </title>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">  
</head>  
<style>  
html {   
    height: 100%;   
}  
body {   
    height: 100%;   
}  
.global-container {  
    height: 100%;  
    display: flex;  
    align-items: center;  
    justify-content: center;  
    background-color: #f5f5f5;  
}  
form {  
    padding-top: 10px;  
    font-size: 14px;  
    margin-top: 30px;  
}  
.card-title {   
font-weight: 300;  
 }  
.btn {  
    font-size: 14px;  
    margin-top: 20px;  
}  
.login-form {   
    width: 330px;  
    margin: 20px;  
}  
.sign-up {  
    text-align: center;  
    padding: 20px 0 0;  
}  
.alert {  
    margin-bottom: -30px;  
    font-size: 13px;  
    margin-top: 20px;  
}  
</style>  
<body>  

<div class="pt-5">  
  <div class="global-container">  
    <div class="card login-form">  
    <div class="card-body">  
        <h3 class="card-title text-center"> Please Verify your email </h3>  
        <div class="card-text">  
            <form method="post" action="otpChecker.php">    
                <div class="form-group">  
                    <label for="exampleInputPassword1"> Enter OTP </label>  
                    <input type="number" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Check your mail for OTP" name="otpInput">  
                </div>  
                <button type="submit" class="btn btn-primary btn-block" name="validate"> Process to pay </button> 
                <?php
                $id=0;
                if(isset($_GET['userId'])){
                    $id=$_GET['userId'];
                    echo "<script>console.log('Get Id is: " . $id . "');</script>";
                }
                if(isset($_GET['userId']) && isset($_POST['validate'])){
                    $id=$_GET['userId'];
                    echo "<script>console.log('Get Id is: " . $id . "');</script>";
                    $otpInput = mysqli_real_escape_string($db, $_POST['otpInput']);
                    $sql = "SELECT * FROM `donar_master` WHERE `id`=$id";
                    $result=mysqli_query($db,$sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $otp = $row['otp'];
                            echo "<script>console.log('Otp is: " . $otp . "' );</script>";
                        }
                    }
                    if ($otpInput==$otp) {
                        echo "<script>alert('Otp Matched' );</script>";
                        header("Location: test.php");
                    }
                    else {
                        echo "<script>alert('Otp Not Matched' );</script>";
                        header("Location: test1.php");
                    }
                }
                
                
                
                // if (isset($_POST['validate'])) {
                    
                //     if ($otpInput==$otp) {
                //         echo "<script>alert('Otp Matched' );</script>";
                //         header("Location: test.php");
                //     }
                //     else {
                //         echo "<script>alert('Otp Not Matched' );</script>";
                //         header("Location: test1.php");
                //     }
                // }
                ?> 
                <a href = "index.php" style="text-align: center;">HOME</a>
            </form>  
        </div>  
    </div>  
</div>  
</div>  
</body>  
</html>  