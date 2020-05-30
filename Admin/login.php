<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/login.css">
    <title>Index page</title>
</head>
<body>
    <div class="container">
        <div class="title">
            <span class="heading"><a href="../index/index.html">INTERNAL ASSESSMENT SYSTEM</a></span>
        </div>

    <div class="main">
        <div class="login">
            <form action="" method="post" name="login">
                <fieldset>
                    <legend class="heading">Admin Login</legend>
                    <input type="text" name="userid" placeholder="Email" autocomplete="off">
                    <input type="password" name="password" placeholder="Password" autocomplete="off">
                    <input type="submit" name="submit" value="Login">
                </fieldset>
            </form>    
        </div>
        <div class="login">
            <form action="" method="post" name="login">
                <fieldset>
                    <legend class="heading">User Login</legend>
                    <input type="text" name="userid" placeholder="Email" autocomplete="off">
                    <input type="password" name="password" placeholder="Password" autocomplete="off">
                    <input type="submit" name="submit1" value="Login">
                </fieldset>
            </form>    
        </div>
        </div>
    <div class="footer">
        <span>Designed & Coded By Susovan Pal & Sangeetha PM</span>

</div>
</body>
</html>

<?php
    include("init.php");
    session_start();
    if(isset($_POST['submit'])){

    if (isset($_POST["userid"],$_POST["password"]))
    {
        $username=$_POST["userid"];
        $password=$_POST["password"];
       
        $sql = "SELECT userid FROM admin_login WHERE userid='$username' and password = '$password'";
        $result=mysqli_query($conn,$sql);

        // $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);
        
        if($count==1) {
           
            $_SESSION['login_user']=$username;
            header("Location: dashboard.php");
        }else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password")';
            echo '</script>';
        }
        
    }
}
?>

<?php
    include("init.php");

    if(isset($_POST['submit1'])){

    if (isset($_POST["userid"],$_POST["password"]))
    {
        $userid=$_POST["userid"];
        $password=$_POST["password"];
        $sql = "SELECT userid FROM user WHERE userid='$userid' and password = '$password'";
        $result=mysqli_query($conn,$sql);

        // $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);
        
        if($count==1) {
            $_SESSION['login_user']=$userid;
            header("Location:/internal/Users/sdashboard.php");
        }else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password")';
            echo '</script>';
        }
        
    }
}
?>
