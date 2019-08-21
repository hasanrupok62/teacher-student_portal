<!DOCTYPE html>
<?php session_start();
	if(!empty($_SESSION['type']=='student')){
		//echo "hello";
	}else{
		header('location: index.php');
	}?>
<?php include("dbconnect.php");?>
<?php
	date_default_timezone_set('Asia/Bangkok');
	
?>
<html>
<head>
	<title>MENU</title>
	<link href="style.css" rel="stylesheet" type="text/css"/>
	<style type="text/css">

table {
	background-color: #fff;
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
}
				</style>

</head>
<body>
<body style="background-color: #3341FF;">
	<div id="div1">
	
		<div id="div2">	
        <div class="wrapper">
			<header>
				<h1><?php echo $user=$_SESSION['username']; ?></h1>
				<nav>
					<ul>	
						<li><a href="search1.php">Search</a></li>
						<li><a href="user_settings.php">Settings</a></li>
						<li><a href="logout.php">Logout</a></li>
						<li><a href="snotification.php">Notification</a>  </li><!--notification work-->
		
					</ul>
	
				</nav>
	
			</header>
		</div>
		</div>
		<div class="middle">
			<div class="container1">
			</div>
				<h1>Taken courses</h1>
				<br>
				<div class="table">
				<table style="width:100%">
					 
					 <tr>
	                     <td> Section</td>
	                     <td> Teachers Name</td>
	                     <td> courseid</td>
	                </tr>



				<?php
				$db_host="localhost";
			    $db_username="root";
			    $db_password="";
			    $db_name="teacher-studentportal";
			    
			    $data=mysqli_connect($db_host,$db_username,$db_password,$db_name);
			    if(!$data){       
			        echo "Connection failed";
			    }
				$sqlcourse = "SELECT course_id FROM choose where s_id='".$_SESSION['username']."'";
				$result =mysqli_query($data,$sqlcourse);
				while($row=mysqli_fetch_array($result))
				{
					
					$courseid=$row['course_id'];
					$a=$row['course_id'];
					echo "<ol type='1'>";
					//echo   '<li >' .$row['course_id'].'<br>';
       				 if(!$sqlcourse)
        			{
            			echo "Something wrong !!!!";
        			}
        				$sqlteacher = "SELECT * FROM section natural join takes NATURAL JOIN teacher WHERE course_id='$courseid'";
						$res =mysqli_query($data,$sqlteacher);
						$j=1;
						$i=1;
						while($row=mysqli_fetch_array($res))
						{
						
							$courseid=$row['t_id'];
							?>                   	
		    	           <tr>
		    	           	
							<td><?php echo $row['sec_name'];?></td>
							<?php echo "<td><a href=\"studentview.php?tid=".$row['t_id']."&courseid=".$row['sec_id']."\" >"?> <?php echo $row['t_name'];?> <?php echo "</a> </td>"; ?>
							<td><?php echo $a;?></td>
							<?php //echo "<td><a href=\"studentview.php?tid=".$row['t_id']."&courseid=".$row['sec_id']."\" > show </a> </td>"; ?>
						  </tr>
							<?php
							

							}

							?>
						
						<?php

				}
				
				   
				?>
				</table>
						</div>
				</div>
				</div>
				


</body>
</html>
