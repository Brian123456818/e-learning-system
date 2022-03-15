<?php
session_start();
if(isset($_POST['submit']))
{
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "unregister";
 $con = new mysqli($servername, $username, $password, $dbname);
 $lecturerID=$_POST['lecturerID'];
 $password=$_POST['password'];


 
   $sql = "select * from lecturer WHERE lecturerID='$lecturerID' and password='$password'";
   $result = mysqli_query($con, $sql);
   
   if (mysqli_num_rows($result) > 0)
   {
    $_SESSION['lecturerID']=$lecturerID;
	header("Location: LecturerIndex.php");
   }
   else
   {
   $error= "You entered Id or password is incorrect";
   }
}

?>
<html lang="en">
<head>
<title>HELP UNIVERSITY E-SUBMISSION</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/loginCss.css" rel="stylesheet" type="text/css">
<script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
</head>
<header>
<div class="footer">  
<figure><img src="pics/Help-University-Logo.PNG" alt="Logo" width="200" height="150"></figure>
</div>
</header>
<body>
    <div class="login-page">
  <div class="form">
    <form class="login-form" action="admin_Login.php" method="POST">
      <input type="text" name= "lecturerID" placeholder="Lecturer ID" required="" />
      <input type="password" name="password" placeholder="Password" required = "" />
      <?php if (isset($error)): ?>
	  			<span style="color:red; font-weight:bold;text-align:left;"><?php echo $error; ?><?php unset($error);?></span><br><br>
	   			<?php endif ?>
      <button type="submit" name= "submit">SIGN IN</button>
      <p class="message">Login as System Admin <a href="systemAdmin_login.php">System Admin Login</a></p>
	  <p class="message">Login as Student? <a href="loginPage.php">Student Login</a></p>
    </form>
  </div>
</div>
</body>




</html>