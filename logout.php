
<?php
  session_start();
  $_SESSION["login"] = "NA";
  $_SESSION["Adminlogin"] = "NA";
  session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
</head>
<body>
<script type="text/javascript">
	// alert("You are successfully logout! ! !");
	window.location = "index.php";
</script>
</body>
</html>