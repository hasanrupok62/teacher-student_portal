<!DOCTYPE html>
<?php session_start();
	if(!empty($_SESSION['type']=='student')){
		//echo "hello";
	}else{
		header('location: index.php');
	}?>
<?php include("dbconnect.php");?>
<?php include("function.php");?>
<?php
	date_default_timezone_set('Asia/Bangkok');
?>
<html>
<head>
	<title>NOTIFICATION</title>
	<link rel="stylesheet" type="text/css" href="demo.css">
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
	
</head>
</head>
<body>
<div>
	<div class="div1">
		<div id="div2">	
	        <div class="wrapper">
				<header>
					<h1><?php echo $user=$_SESSION['username']; ?></h1>
					<nav>
						<ul id="up">
							<li><a href="studenthome.php">Home</a></li>
							<li><a href="search1.php">Search</a></li>
							<li><a href="logout.php">Logout</a></li>
							<!--<li><a href="notification.php">Notification</a>  </li>-->
				
						</ul>
		
					</nav>
				</header>
			</div>
		</div>
	</div>
	<!--<div class="container">-->
		<div class="container1"
      		<?php 
      			$flag=0;
      			$db_host="localhost";
			    $db_username="root";
			    $db_password="";
			    $db_name="teacher-studentportal";
			    
			    $data=mysqli_connect($db_host,$db_username,$db_password,$db_name);
			    if(!$data){       
			        echo "Connection failed";
			    }
				 ?>
				<div class="container1">
					<?php
						$_SESSION['notification']="seen";
						$sqlshow="SELECT notification_id, s_id, t_id, sec_id, post_body, post_date, checking FROM notification WHERE checking='0' AND s_id='".$_SESSION['username']."'";
						$flow=mysqli_query($data,$sqlshow);
						
						//echo "<div> <table>";
						while($row=mysqli_fetch_array($flow))
						{
							echo "<div class='comment-box'style='background-color:rgb(244, 249, 250);'><p >";
							//$givenpostid = $row1['post_id'];//techer post
							$re=mysqli_query($data,"SELECT t_name FROM teacher where t_id='".$row['t_id']."'");
							$a=mysqli_fetch_array($re);
							//$teacherid = $row1['t_id'];
							$teachername=$a['t_name'];
							echo "<td><a href=\"studentview.php?tid=".$row['t_id']."&courseid=".$row['sec_id']."\" >"?> <?php echo $teachername;?> <?php echo "</a> </td>";
							echo '<br>'.$row['post_date'].'<br>';
							echo $row['post_body'];
							//echo "<br><br>";
							echo "</p></div>";
							$flag=1;

						}
						//echo "</table> </div>";

						/*if($flag > 0)
						{
							$sql1="UPDATE notification SET checking='1' WHERE s_id='".$_SESSION['username']."'";
							mysqli_query($data,$sql1);
						}*/

						?>
				</div>
      	</div>
      	</div>
	</div>  

</div>
</body>
</html>
