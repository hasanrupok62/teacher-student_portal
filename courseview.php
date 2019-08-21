<!DOCTYPE html>
<?php session_start();
	if(!empty($_SESSION['type']=='student')){
		//echo "hello";
	}else{
		header('location: index.php');
	}?>
<?php include("dbconnect.php");
 $flag=0;?>
<?php
	date_default_timezone_set('Asia/Bangkok');
?>
<html>
<head>
	<title>TEACHERPOST</title>
	<link rel="stylesheet" type="text/css" href="demo.css">
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
	
</head>
</head>
<body>
<body  style="background-color:powderblue;">
<div>
	<div class="div1">
		<div id="div2">	
	        <div class="wrapper">
				<header>
					<h1><?php echo $user=$_SESSION['username']; ?></h1>
					<nav>
						<ul id="up">	
										<li><a href="studenthome.php">Home</a></li>
										
										<li><a href="logout.php">Logout</a></li>
										<li><a href="snotification.php">Notification</a>  </li><!--notification work-->
							
						</ul>
		
					</nav>
				</header>
			</div>
		</div>
	</div>
<div class="container">
    <div class="col-sm-8">
      	<div class="container1">
      	<?php 
      				$db_host="localhost";
				    $db_username="root";
				    $db_password="";
				    $db_name="teacher-studentportal";
				    
				    $data=mysqli_connect($db_host,$db_username,$db_password,$db_name);
				    if(!$data){       
				        echo "Connection failed";
				    }
				    $sql="SELECT * FROM section WHERE course_id='".$_GET['cid']."'";
				    $result=mysqli_query($data,$sql);
				    if($row1=mysqli_fetch_array($result))
				    {
				    
				    	?>
				    	<div class="table">
						<table style="width:100%">
						 
						 <tr>
		                     <td> Section</td>
		                     <td> Teachers Name</td>
		                     <td> courseid</td>
		                </tr>



					<?php
					
					
	        				$sqlteacher = "SELECT * FROM section natural join takes NATURAL JOIN teacher WHERE course_id='".$row1['course_id']."'";
							$res =mysqli_query($data,$sqlteacher);
							$j=1;
							$i=1;
							while($row=mysqli_fetch_array($res))
							{
							
								$courseid=$row['t_id'];
								?>                   	
			    	           <tr>
			    	           	
								<td><?php echo $row['sec_name'];?></td>
								<?php echo "<td><a href=\"studentview.php?tid=".$row['t_id']."&courseid=".$row['sec_id']."\" >"?> <?php echo $row['t_name'];
								echo "</a> </td>"; ?>
								<!--<td><?php $a;?></td>-->
								<?php //echo "<td><a href=\"studentview.php?tid=".$row['t_id']."&courseid=".$row['sec_id']."\" > show </a> </td>";
								echo '<td>'.$row['course_id'].'</td>' ?>

							  </tr>
								<?php
								

								}
							}

								

					
					
					   
					?>
					</table>
							</div>
					    