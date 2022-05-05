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
                if(isset($_GET['userId'])){
                    $id=$_GET['userId'];
                    echo "<script>alert('Id is: " . $id . "' );</script>";
                }
                $sql = "SELECT * FROM `donar_master` WHERE `id`=$id";
                $result=mysqli_query($db,$sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $otp = $row['otp'];
                        echo "<script>console.log('Otp is: " . $otp . "' );</script>";
                        break;
                    }
                }
                if (isset($_POST['validate'])) {
                    
                    if($id>0){
                        
                        echo "<script>console.log('Get Id is: " . $id . "');</script>";
                    }
                    else {
                        echo "<script>console.log('Get Id not found!');</script>";
                    }
                    
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
                
                ?>
                <a href = "index.php" style="text-align: center;">HOME</a>
            </form>  
        </div>  
    </div>  
</div>  
</div>  
</body>  
</html>  