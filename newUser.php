<?php
include "valid/check.php";
?>
<!DOCTYPE html>
<html lang="en">
<head class="no-js">
        <meta charset="utf-8">
        <title>E-Helping hand | Charity</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>

        <!-- Bootsrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- Font awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <!-- Owl carousel -->
        <link rel="stylesheet" href="css/owl.carousel.css">

        <!-- Template main Css -->
        <link rel="stylesheet" href="css/style.css">
        
        <!-- Modernizr -->
        <script src="js/modernizr-2.6.2.min.js"></script>

    <title>Register</title>
</head>
<body background="images\gallery\poverty_New_User.jpg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="donateModalLabel">REGISTER HERE</h4>
            </div>
            <div class="modal-body">
            <form class="form-donation" method="post" action="newUser.php">

                <h3 class="title-style-1 text-center">Please fill out this field <span class="title-under"></span>  </h3>

                <div class="row">

                    <div class="form-group col-md-12 ">
                        <input type="text" class="form-control" id="firstName" name="first_name" placeholder="First Name*" required>
                    </div>
                    <div class="form-group col-md-12 ">
                        <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Last Name*" required>
                    </div>
                    <div class="form-group col-md-12 ">
                        <input type="number" class="form-control" id="amount" name="ammount" placeholder="Amount*" required>
                    </div>

                </div>

                <div class="row">

                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" name="email" placeholder="Email*" required>
                    </div>

                    <div class="form-group col-md-6">
                        <input type="number" class="form-control" name="phone" placeholder="Phone*" required>
                    </div>
                    
                    <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="country" placeholder="Country">
                    </div>

                    <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="address" placeholder="Address">
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-md-12">
                        <textarea cols="30" rows="4" class="form-control" name="note" placeholder="Additional note"></textarea>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" name="reg">NEXT</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    
</body>
</html>