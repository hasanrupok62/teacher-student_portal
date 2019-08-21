<?php
session_start();
include("dbconnect.php");
if(empty($_SESSION["username"]))
{
?>

<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="stylel.css"></link>
	<link rel="stylesheet"  href="css/font-awesome.css"></link>
	<style >
		a{
			color: red;
			font-size: 15;
		}
	</style>
</head>
<?php


	$username="";
	$password="";
	
	$flag=false;
	$msg="";

	if(isset($_POST['username']) && isset($_POST['password']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		if(studentaccount($username,$password)){
			$flag=true;
			$_SESSION['password']=$password;
			$_SESSION['username']=$username;
			$_SESSION['teachername']=0;
			$_SESSION['type']="student";
			header("Location: studenthome.php");
		}
		else if(teacheraccount($username,$password)){
			$flag=true;
			$_SESSION['password']=$password;
			$_SESSION['username']=$username;
			$_SESSION['login']=0;
			$_SESSION['type']="teacher";
			header("Location: teacherhome1.php");
		}

		if(!$flag){
			$msg="Username/Password didn't match";
		}


	}
?>
<body>
<h1>Student Portal</h1>
		
	<form  action="startpage.php" method="post">
		<div class="container">
			<br>
			<br>
			<!--<img />-->
			<div class="form-input">
				<input type="text" name="username" placeholder="Username" required="required"/>
				<br>
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="Password" required="required"/>
				<br>
			</div>
			<br>
			<br>
			<button type="submit" class="btn-login"> Login</button>
			<br>
			<level>Dont have an account?</level>
			<br><br>
			<level>SIGNED UP AS</level>
			<br>
			<br>
			<a href="signupteacher.php">As teacher</a>
			<br>
			<a href="signupstudent.php">As Student</a>
			<br>
			<br>
				
		</div>
	</form>
		
</body>

</html>

<?php 
}
else
{
	$user=($_SESSION['username']);
	$pass=($_SESSION["password"]);
	if(studentaccount($user,$pass)){

		header("Location: studenthome.php");

	}
	else
	{
		header("Location: teacherhome1.php");
	}
}

?>