<?php
include "security/db.php";
include "security/constant.php";
include "security/co.inc";
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
                    <input type="number" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Check your mail for OTP" name="otpInput" required>  
                </div>  
                <button type="button" class="btn btn-primary btn-block" onClick="checkOtp()" name="validate"> Process to pay </button>  
                <?php
                $flag = 0;
                if(isset($_GET['userId'])){
                    $id = $_GET['userId'];
                    
                    $sql = "SELECT * FROM `donar_master` WHERE `id`=$id";
                    $result = mysqli_query($db,$sql);
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            $otp=(string)$row['otp'];
                            break;
                        }
                    }
                    echo "<script>var id = $id;
                    var otp = $otp;
                    var verified = 'N';
                    console.log('Id is : ' + id);
                    console.log('OTP is : ' + otp);
                    function checkOtp(){
                        var otpInput = 0;
                        otpInput = document.getElementById('exampleInputPassword1').value;
                        
                        if(otp == otpInput){
                            window.location.href = 'test.php'; 
                        }
                        else{
                            window.location.href = 'test1.php';
                        }
                    }
                    </script>";
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