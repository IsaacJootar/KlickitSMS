<?php ob_start();?>
<?php session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_STRICT & ~E_DEPRECATED);

    $role=$_SESSION['SESS_USER_ROLE'];
    
include('includes/config2.php') ;
require_once('classes/schoolInformation.php'); ?>
<!DOCTYPE html>
<html>
<head>
  
<meta charset="UTF-8">

<title>Welcome to Klickit School Management Software</title>
<link rel="icon" 
      type="image/png" 
      href="favicon.ico">
<style>
body {
    background:url(images/try.png) no-repeat;
    background-position:left;
    font-family: Montserrat;
    float:right;
    width: 420px;
    height: 640px;


    
    
}



.login-block {
    width: 320px;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
  
    margin: 0 auto;
}

.login-block h1 {
    text-align: center;
    color: #000;
    font-size: 28px;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 20px;
}

.login-block input {
    width: 100%;
    height: 42px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 19px;
    font-family: Montserrat;
    padding: 0 20px 0 50px;
    outline: none;
}

.login-block button {
    width: 100%;
    height: 35px;
    background:#004aad;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #e15960;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    font-family: Montserrat;
    outline: none;
    cursor: pointer;
}

.login-block button:hover {
    background:#000;
}

</style>
</head>

<body>

<div class="logo"></div>
<div  align="center" class="login-block">
  <h1 style="color:#004aad"><?php echo $school_address=schoolInformation::find_school_name();?></h1>
  <form name="login" method="post" action="login_exe.php">
   <p align="center" style="font-weight:bold"> <img src="images/jet.jpg" width="140" height="140">
   <i style="color:#F36" align="center"> </i>
  <p align="center"><img src="images/group.png" width="64" height="64">
    <input type="text" name="username"  autofocus placeholder="Username"/>
    <input type="password" name="password" autofocus  placeholder="Password" />
  </p>
 
<button type="submit" name="submit">Login</button>
<div align="center">
     <p align="center">&copy; KlickitSMS. A product of Klickit Systems. <?php echo date('Y'); ?>
                all rights reserved. </p>
  </div>
  
</form>
<?php
    if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 )
     {
        
        foreach($_SESSION['ERRMSG_ARR'] as $msg) 
        {
        echo '<br>' .'<b style="color:#f00">',$msg,'</b>'; 
        }
        
        unset($_SESSION['ERRMSG_ARR']);
     }
     
    ?>

</div>
 
</body>

</html>
