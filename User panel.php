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
if(isset($_GET['getback'])){
    unset($user_id);
    session_start();
    header('location: User interface.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <style>
        .nameUser{
            font-size: 2rem;
            margin-left: 5rem;
            margin-top: 1rem;
        }
        #profile{
            margin-top: 10px;
            width: 100px;
            height: 100px;
        }
        #profile img{
            width:100%;
            height: 100%;
            border-radius: 50%;
        }
        .backhome{
            padding: 20px;
            position: absolute;
            left: 0px;
            font-size: 4rem;
        }
        .backhome .fa-left-long{
            color: blue;
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://kit.fontawesome.com/c49fa14979.js" crossorigin="anonymous"></script>
    <title>User</title>
</head>
<body>
    <div class="backhome">
        <a href="User interface.php?getback=<?php echo $user_id;?>"><i class="fa-solid fa-left-long"></i></a>
    </div>
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					
				</div>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php
                        $select = mysqli_query($con, "SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed');
                        if(mysqli_num_rows($select) > 0){
                            $fetch = mysqli_fetch_assoc($select);                   
                        }
                        ?>
					</div>
					<div class="profile-usertitle-job" id="profile">
                        <?php   
                        if($fetch['User_Image'] == ''){
                            echo '<img src="images/default-avatar.png">';
                        }
                        else{
                            echo '<img src="upload_img/'.$fetch['User_Image'].'" class"userprofile">';
                        }
                        ?>
					</div>
                    <p class="nameUser">
                        <?php echo $fetch['User_Name'];?>
                    </p>
				</div>
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>

				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="?logout">
							<i class="fa-solid fa-arrow-right-from-bracket"></i>
							Log Out </a>
						</li>
						
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
			   Some user related content goes here...
            </div>
		</div>
	</div>
</div>

</body>
</html>