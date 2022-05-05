<?php



include "security/db.php";

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