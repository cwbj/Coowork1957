<?php
include 'coniction.php';
session_start();
$user_id = $_SESSION ['UserId'];
if(!isset($user_id)){
    header('location: index.php');
}
if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location: index.php');
}
if(isset($_GET['getin'])){
    unset($user_id);
    session_start();
    header('location: User panel.php');
}

?>
<!DOCTYPE html>
<html lang="en">
    <style>
        body{
            margin:0;
            padding: 0;
        }
        .uer_account{
            position: absolute;
            right: 10px;
            top: 10px;
        }

        span{
            margin-left: 10px;
        }
        .uer_profile{
            width: 80px;
            height: 80px;
            border: 2px solid #EDDA74;
        }
        .uer_profile img{
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }
        .fa-right-from-bracket, .fa-user-tie{
            font-size: 1.3rem;
            margin-top: 10px;
            color: #F2BB66;
        }
        .uer_name a{
            text-decoration: none;
            color: red;
        }
        .uer_name a:active{
           border: 2px solid blue;
           border-radius: 10px;
        }
        #my-account{
            color: #00FA9A;
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c49fa14979.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-8">
            <?php include 'index.php'?>
            <div class="uer_account">
                    <?php
                        $select = mysqli_query($con, "SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed');
                        if(mysqli_num_rows($select) > 0){
                            $fetch = mysqli_fetch_assoc($select);                   
                        }
                    ?>
                 
                <div class="uer_profile">   
                    <?php   
                        if($fetch['User_Image'] == ''){
                            echo '<img src="images/default-avatar.png">';
                        }
                        else{
                            echo '<img src="upload_img/'.$fetch['User_Image'].'" class"userprofile">';
                        }
                        ?>
                </div>
                <div class="uer_name"><i><?php echo $fetch['User_Name'];?></i></div>
                <div class="uer_name"><i class="fa-solid fa-user-tie"></i><a href="?getin"><span id="my-account">My Account<span></a></div>
                <div class="uer_name"><i class="fa-solid fa-right-from-bracket"></i><span><a  href="?logout">Logout</a> <span></div>
            </div>

        </div>
    </div>
</div>
</body>
</html>