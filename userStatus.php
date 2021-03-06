<?php 
include "security/db.php";
include "security/constant.php";
include "security/co.inc";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Status</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Varela Round', sans-serif;
    font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px 25px;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 15px;
    background: #299be4;
    color: #fff;
    padding: 16px 30px;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
}
.table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
}
.table-title .btn {
    color: #566787;
    float: right;
    font-size: 13px;
    background: #fff;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 10px;
}
.table-title .btn:hover, .table-title .btn:focus {
    color: #566787;
    background: #f2f2f2;
}
.table-title .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
}
.table-title .btn span {
    float: left;
    margin-top: 2px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
}
table.table tr th:first-child {
    width: 60px;
}
table.table tr th:last-child {
    width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}	
table.table td:last-child i {
    opacity: 0.9;
    font-size: 22px;
    margin: 0 5px;
}
table.table td a {
    font-weight: bold;
    color: #566787;
    display: inline-block;
    text-decoration: none;
}
table.table td a:hover {
    color: #2196F3;
}
table.table td a.settings {
    color: #2196F3;
}
table.table td a.delete {
    color: #F44336;
}
table.table td i {
    font-size: 19px;
}
table.table .avatar {
    border-radius: 50%;
    vertical-align: middle;
    margin-right: 10px;
}
.status {
    font-size: 30px;
    margin: 2px 2px 0 0;
    display: inline-block;
    vertical-align: middle;
    line-height: 10px;
}
.text-success {
    color: #10c469;
}
.text-info {
    color: #62c9e8;
}
.text-warning {
    color: #FFC107;
}
.text-danger {
    color: #ff5b5b;
}
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 13px;
    min-width: 30px;
    min-height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 2px !important;
    text-align: center;
    padding: 0 6px;
}
.pagination li a:hover {
    color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 10px;
    font-size: 13px;
}
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Your <b>Status</b></h2>
                    </div>
                </div>
            </div>
            <h4>
                <?php 
                if(isset($_GET['userId'])){
                    $id = $_GET['userId'];
                    
                    $sql = "SELECT * FROM `donar_master` WHERE `id`=$id";
                    $result = mysqli_query($db,$sql);
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            $firstName = $row['first_name'];
                            $lastName = $row['last_name'];
                            $address = $row['address'];
                            $country = $row['country'];
                            $ammount = $row['ammount'];
                            break;
                        }
                        $name = $firstName." ".$lastName;
                        echo "Name = ".$name;
                        echo "<br>";
                        echo "Ammount You Pay = ???".$ammount;
                    }
                }
                ?>
            </h4>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Country</th>
                        <th>Transaction Date</th>
                        <th>Transaction Time</th>			
                        <th>Transaction Ammount</th>
                        <th>Donate For</th>	

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $slId = 0;
                    $sql = "SELECT * FROM `ammount` WHERE `d_id`=$id ORDER BY `created_on` DESC";
                    $result = mysqli_query($db,$sql);
                    
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            $slId = $slId + 1;
                            $created_on=date_create($row['created_on']);
                            $date = date_format($created_on,"d/m/Y");
                            $time = date_format($created_on,"H:i:s");
                            $amm = $row['ammount'];
                            $note = $row['note'];
                            $phone = $row['phone'];
                            echo ' <tr>
                            <th scope="row">'.$slId.'</th>
                            <td>'.$name.'</td>
                            <td>'.$phone.'</td>
                            <td>'.$address.'</td>
                            <td>'.$country.'</td>
                            <td>'.$date.'</td>
                            <td>'.$time.'</td>
                            <td>'.$amm.'</td>
                            <td>'.$note.'</td>
                            </tr>';
                            
                        }
                    }
                    ?>
                </tbody>
            </table>
            
        </div>
    </div>
</div>     
</body>
</html>