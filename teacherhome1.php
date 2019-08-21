<!DOCTYPE html>
<?php session_start();
	 if(!empty($_SESSION['type']=='teacher')){
    //echo "hello";
  	}else{
    	header('location: index.php');
  }
?>
<?php include("dbconnect.php");?>
<?php include("function.php");?>
<?php
	date_default_timezone_set('Asia/Bangkok');
?>
<html>
<head>
	<title>MENU</title>
	<link href="demo.css" rel="stylesheet" type="text/css"/>
	<style type="text/css">
				</style>
</head>
</head>
<body>
<body>
	<div id="div1">
	
		<div id="div2">	
        <div class="wrapper">

						<header>
							<h1><?php echo $user=$_SESSION['username']; ?></h1>
							<nav>
								<ul id="up">	
						            <li><a href="teacher_settings.php">Settings</a>  </li>
									
									<li><a href="logout.php">Logout</a></li>
					
								</ul>
				
				</nav>
				
				</header>
	</div>
	</div>
		<div class="middle">
			<div class="left_bar">
				<h1>Taken Courses</h1>
				<?php
					$db_host="localhost";
    $db_username="root";
    $db_password="";
    $db_name="teacher-studentportal";
    
    $data=mysqli_connect($db_host,$db_username,$db_password,$db_name);
    if(!$data){       
        echo "Connection failed";
    }
					$sqlteacher="SELECT course_id,sec_id FROM takes WHERE t_id='".$_SESSION['username']."' ";
					$res =mysqli_query($data,$sqlteacher);
					if(!$res)
						echo"problem";
					while($row=mysqli_fetch_array($res)) //comment section of each post
					{
						$takensecid = $row['sec_id'];
						$takencourseid = $row['course_id'];

						$sqlcoursename="SELECT c_name FROM course WHERE course_id='$takencourseid'";
						$resu=mysqli_query($data,$sqlcoursename);
						while($row1=mysqli_fetch_array($resu)){
						$a=$row1['c_name'];
						}
						 

                 		 echo "<section class='Options'>";
						echo "<ul>"; 
						//echo $row['sec_id'];
					 	echo "<li><a href='teacherhome.php?takenid=".$row['course_id']."&secid=".$row['sec_id']."' >";
					 	/*echo "<form method = 'post' action = ''>";
					 	echo "<input type = 'hidden' name = 'sec_id' value = '".$row['sec_id']."'>";

					 	echo "</form>";
					 	$_SESSION['sec_id'] = $_POST['sec_id'];*/
						echo $a;
						echo $takensecid;

					 	echo "</a> </li>"; 
						//<!--<li><a href="teacherhome.php?takenid=$takencourseid"><?php echo $takencourseid;</a></li>-->
		            
	               		echo "</ul>	
	          			</section>";
				 	} 
				 	?>
			</div>
			<div id="section">
			<aside>
</body>
</html>