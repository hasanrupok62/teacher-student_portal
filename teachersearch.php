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
		color: black;
	    border: 1px solid #dddddd;
	    text-align: left;
	    padding: 8px;
	}

	tr:nth-child(even) {
	    background-color: #dddddd;
	}
</style>

</head>
<body>
<body>
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
			<table style="width:100% ">
					 
					 <tr>
					 	<td> courseid</td>
	                    <td> Section</td>     
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
				    $sqlsearch="SELECT * FROM takes WHERE t_id='".$_GET['tid']."'";
				    $a=mysqli_query($data,$sqlsearch);
				    while($row=mysqli_fetch_array($a))
				    {
				    		$coursesid=$row['course_id'];
				    		$sqlcourse="SELECT * FROM course WHERE course_id='".$row['course_id']."'";
				    		$ab=mysqli_query($data,$sqlcourse);

				    		$rows=mysqli_fetch_assoc($ab);
				    		
				    			
				    		
				    		$sqlsection="SELECT * FROM section WHERE course_id='".$rows['course_id']."' AND sec_id='".$row['sec_id']."'";
				    		$abc=mysqli_query($data,$sqlsection);
				    		while($x=mysqli_fetch_array($abc))
				    		{
				    			echo '<tr><td>';
				    			echo $rows['c_name'].'('.$row['course_id'].')';
				    			echo '</td>';

								echo "<td><a href=\"studentview.php?tid=".$_GET['tid']."&courseid=".$row['sec_id']."\" >"; 
								echo $x['sec_name'];
								echo "</a> </td> </tr>"; 
							}
					}

					?>
			</table>
			</div>
			</div>
			</div>
			</body>
