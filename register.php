<?php
include 'coniction.php';
if(isset($_GET['login'])){
    session_destroy();
    header('location: User login.php');
}
if(isset($_POST['register']))
{
    $fullName = mysqli_real_escape_string($con, $_POST['fullname']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $date= mysqli_real_escape_string($con, $_POST['date']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, ($_POST['password']));
    $cpassword = mysqli_real_escape_string($con, ($_POST['cpassword']));
    
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'upload_img/'.$image;
    $iformation = mysqli_real_escape_string($con, $_POST['iformation']);

    $select = mysqli_query($con, "SELECT * FROM `user` WHERE User_Email = '$email' AND User_Password = '$password'") or die('query failed');
    if(mysqli_num_rows($select) > 0)
    {
        $message[] = 'E_mail aready use';
    }
    else{
        if($password != $cpassword){
            $message[] = 'confirm password not correct!';
        }elseif($image_size > 5000000){
            $message[] = 'image size too large!';
        }else{
            $insert = mysqli_query($con, "INSERT INTO `user` (`User_Name`, `User_Gender`, `User_Date`, `User_Email`, `User_Password`, `User_Image`, `User_Infor`)
            VALUES ('$fullName', '$gender', '$date', '$email', '$password', '$image', '$iformation')") or die('query failed');
        }
        if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registed Succesfuly';
            session_destroy();
            header('location: User login.php');
        }else{
            $message[] = 'registration failed!';
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">
    <style>
        .container{
            margin-top: 5rem;
        }
        .form-group label{
            align-seft:center;
            margin-left: 1rem;
        }
        #female, #male, #other{
            width: 1rem;
            margin-left: 1rem;
        }
        .message{
            width: 100%;
            border: 1px solid blue;
            text-align: center;
            font-size: 1.3rem;
            color: white;
            background-color: blue;
        }
        .container i{
            color: #09CBE9;
            font-size: 1.3rem;
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/c49fa14979.js" crossorigin="anonymous"></script>
    <title>Register</title>
</head>
<body>
    
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="container">
    <h2 class="text-center">To Be Our Patner</h2>
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">
                    <!--Form with header-->
                    <form method="POST" enctype="multipart/form-data">
                        <?php 
                            if(isset($message))
                            {
                                foreach($message as $message){
                                    echo '<div class="message">'.$message.'</div>';
                                }
                            }
                        ?>
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3>Register</h3>
                                    <p class="m-0">Jone use to be our patner this is our commnity</p>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" name="fullname" class="form-control" id="nombre"  placeholder="Your Full Name" required>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa-solid fa-cake-candles"></i></div>
                                        </div>
                                        <input type="date" class="form-control" id="nombre" name="date" placeholder="Date Of Birth" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="nombre" name="email" placeholder="ejemplo@gmail.com" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
                                        </div>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="great new password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa-regular fa-circle-check"></i></div>
                                        </div>
                                        <input type="password" class="form-control" id="password" name="cpassword" placeholder="confirm Password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa-regular fa-image"></i></div>
                                        </div>
                                        <input type="file" class="form-control" id="file" name="image" placeholder="your image">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa-solid fa-pen" style="color: #00FFFF;"></i></div>
                                        </div>
                                        <textarea class="form-control" placeholder="Who are you" name="iformation" required></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" value="Sing in" class="btn btn-info btn-block rounded-0 py-2" name="register" id="submit">
                                </div>
                                <div class="text-center" style="margin-top: 1rem;">
                                    <a href="?login">Login</a>
                                </div>
                            </div>

                        </div>
                        <?php
                        //databest connection 
                        ?>
                    </form>
                    <!--Form with header-->
            </div>
	</div>
</div>
<script>
let submit = document.getElementById('submit');
submit.addEventListener("click", function() {
    location.reload()
    date.remove()
})
</script>
</body>
</html>


