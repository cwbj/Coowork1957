<?php 
session_start();
if(!isset($_SESSION['AdminLoingId']))
{
    header("location: Admin loing.php");
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c49fa14979.js" crossorigin="anonymous"></script>
    <link href="post.css" rel="stylesheet">
    <title>Admin Panel</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
    .Admin-infor{
        text-align:center;
        margin-left: 1.5rem;
    }
    .Admin-infor .fa-user{
        font-size: 3.5rem;
        color: blue;
    }
    .Admin-infor p{
        font-size: 2rem;
    }
    .lo-out{
        position: absolute;
        right: 1rem;
        top: 1rem;
    }
    #louot{
        padding: .50rem;
        font-size: 1rem;
        border-radius: 10px;
        background-color: rgb(211, 139, 7);
        color: white;
        border: 1px solid white;
    }
    #louot:active{
        background-color: blue;
    }
</style>
</head>

<body>
<div class="Admin-infor">
    <i class="fa-regular fa-user"></i>
    <p><?php echo $_SESSION ['AdminLoingId']?></p>
   </div>
<form method="POST">
    <div class="lo-out">
        <button name="logOut" id="louot">Log out</button>
    </div>
</form>


    <?php 
    if(isset($_POST['logOut']))
    {
        session_destroy();
        header("location: Admin loing.php");
    }
    
    ?>
<?php 
    include 'post.php';
?>
</body>
</html>
