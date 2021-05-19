<?php ob_start(); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Welcome to Klickit School Management Software</title>
<style>
body {
    background:url(boy-writing.jpg) no-repeat;
	background-position:left;
    font-family: Montserrat;
	float:right;
	
	
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
    height: 40px;
    background:#09C;
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
<div class="login-block">
  <h1 style="color:#09C">Klickit School Management Software</h1>
  <div align="center">
    <p style="color:#F36">Everything is just a klick away!  </p>
  </div>
  <div style="border:dashed">
  <table width="300">
    <tr>
      <th scope="col"><div align="left"><strong>ROLE</strong></div></th>
      <th scope="col"><div align="left"><strong>USER</strong></div></th>
      <th scope="col"><div align="left"><strong>PASSWORD</strong></div></th>
    </tr>
     <tr>
      <td>Student:</td>
      <td>JEA/012</td>
      <td>JEA/012</td>
    </tr>
   
    <tr>
    
    <tr>
      <td>Subject Teacher:</td>
      <td>ST/003</td>
      <td>ST/003</td>
    </tr>
    <tr>
      <td>Form Master:</td>
      <td>ST/014</td>
      <td>ST/014</td>
    </tr>
    <tr>
      <td>Principal/Admin:</td>
      <td>admin</td>
      <td>admin01</td>
    </tr>
    <tr>
      <td>Account Officer:</td>
      <td>acct01</td>
      <td>acct01</td>
    </tr>
    <tr>
      <td>Director:</td>
      <td>director</td>
      <td>dir009</td>
    </tr>
  </table>
  </div>
  <form name="login" method="post" action="login_exe.php">
  <p align="center"><img src="images/group.png" width="64" height="64">
    <input type="text" value="" autofocus placeholder="Username" id="username" />
    <input type="password" autofocus value="" placeholder="Password" id="password" />
  </p>
<button>Login</button>
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