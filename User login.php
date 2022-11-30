<?php
   include 'coniction.php';
   session_start();
    if(isset($_POST['userlogin']))
        {
            $select = "SELECT * FROM `user` WHERE `User_Email`='$_POST[email]' AND `User_Password`='$_POST[Password]'";
            $select = mysqli_query($con,$select);
            if(mysqli_num_rows($select) > 0)
            {
                $row = mysqli_fetch_assoc($select);
                $_SESSION ['UserId'] = $row['id'];
                header("location: index.php?=  ['UserId']");
            }
            else
            {
                echo"<script>alert('your password or name incorrect') </script>";
            }
        }
?>


<!DOCTYPE html>
<html lang="en">
    <style>
          input[type=password] {
    background-color: #f6f6f6;
    border: none;
    color: #0d0d0d;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 5px;
    width: 85%;
    border: 2px solid #f6f6f6;
    -webkit-transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -ms-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
    transition: all 0.5s ease-in-out;
    -webkit-border-radius: 5px 5px 5px 5px;
    border-radius: 5px 5px 5px 5px;
  }
  
  input[type=password]:focus {
    background-color: #fff;
    border-bottom: 2px solid #5fbae9;
  }
  
  input[type=password]:placeholder {
    color: #cccccc;
  }
    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="login.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/c49fa14979.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h1>Login</h1>
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="<?php echo '$emage'?>" alt="">
    </div>

    <!-- Login Form -->
    <form method="POST" enctype="multipart/form-data">
      <input type="text" name="email" id="login" class="fadeIn second"  placeholder="Admin Name">
      <input type="password" name="Password" id="password" class="fadeIn third"  placeholder="password">
      <input type="submit" class="fadeIn fourth ?login" value="Login" name="userlogin" >
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="register.php">register now</a>
    </div>
    <div id="formFooter">
      <a class="underlineHover" href="register.php">forgot password</a>
    </div>

  </div>
</div>