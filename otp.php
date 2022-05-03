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
            <form method="post" action="otp.php">  
                <div class="form-group">  
                    <label for="exampleInputEmail1" name="email"> Email </label>  
                    <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your mail here" name="email" required>  
                    <!-- <Button type="submit" variant="primary" size="sm" style="float:right;font-size:12px;" name="verify"> verefy </Button> -->
                    <button type="submit" class="btn btn-primary btn-block" name="verify"> Next </button> 
                    <?php
                    $otp = rand(11111,99999);
                    if (isset($_POST['verify'])) {
                        $email = mysqli_real_escape_string($db, $_POST['email']);
                        $sql = "SELECT * FROM `donar_master` WHERE `email`='$email'";
                        $result = mysqli_query($db,$sql);
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row['id'];
                                break;
                            }
                            
                            $s="INSERT INTO otp (d_id, otp) 
                            VALUES('$id', '$otp')";
                            mysqli_query($db, $s);
                            header("Location: otpChecker.php?userId='.$id.'");
                        } else {
                            header("Location: test1.php");
                        }
                    }
                    ?>
                </div>   
                <a href = "index.php" style="text-align: center;">HOME</a>
            </form>  
        </div>  
    </div>  
</div>  
</div>  
</body>  
</html>  