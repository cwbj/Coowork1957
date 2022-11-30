<?php
    require("coniction.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="login.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/c49fa14979.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h1>Admin Login</h1>
    <!-- Icon -->
    <div class="fadeIn first">
      <i class="fa-regular fa-user"></i>
    </div>

    <!-- Login Form -->
    <form method="POST">
      <input type="text" id="login" class="fadeIn second"  placeholder="Admin Name" name="AdminName">
      <input type="text" id="password" class="fadeIn third"  placeholder="password" name="AdminPassword">
      <input type="submit" class="fadeIn fourth" value="Log In" name="loing">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>

<?php
        if(isset($_POST['loing']))
        {
            $query="SELECT * FROM `loing` WHERE `Admin_Name`='$_POST[AdminName]' AND `Admin_Password`='$_POST[AdminPassword]'";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result)==1)
            {
                session_start();
                $_SESSION ['AdminLoingId']=$_POST['AdminName'];
                header("location: Admin panel.php");
                
            }
            else
            {
                echo"<script>alert('your password or name incorrect') </script>";
            }
        }
    ?>


</body>
</html>


