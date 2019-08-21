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
<div >
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
	<section class="sectionforsearch">
                <div id = "searchstudent">
                    <br>
                    <br>
                    <form action="" method="POST">
                        <input id="srhBox" type="text" name="input" placeholder="any search" size="">
                        <input id="u_btn" type="submit" name="search" >
                        <br><br>
                    </form>
                </div>
                <div id="book">
                <?php
                	$flag="0";
                	$db_host="localhost";
				    $db_username="root";
				    $db_password="";
				    $db_name="teacher-studentportal";
				    
				    $data=mysqli_connect($db_host,$db_username,$db_password,$db_name);
				    if(!$data){       
				        echo "Connection failed";
				    }


				    if(isset($_POST['search']) && !empty($_POST['input']))
                	{
                		if(!empty($_POST['input']))
                		{
	                		$search=$_POST['input'];
		                	$sql="SELECT s_id,s_name,s_email FROM student WHERE s_name like '$search%'or s_id='$search%' or s_email='%$search%'";
		                	$result =mysqli_query($data,$sql);
							while($row=mysqli_fetch_array($result))
							{
								$flag="1";
								?>
								<div class="comment-box">
								<p>
								<h2><?php echo $row['s_name'];?></h2>
								<b><?php echo $row['s_id'];?></b>
								<h3><?php echo $row['s_email'];?></h3>
								</p>
								</div>
							<?php 
							} 
							$sql1="SELECT t_id,t_name,t_email FROM teacher WHERE t_name like '%$search%'or t_id='$search%' or t_email='%$search%'";
							$result1 =mysqli_query($data,$sql1);
							while($row1=mysqli_fetch_array($result1))
							{
								$flag="1";
								?>
								<div class="comment-box">
								<p>
								<?php echo "<a href=\"teachersearch.php?tid=".$row1['t_id']."\" >"; ?>
									 <h2> <?php echo $row1['t_name'];?> </h2> 
									 <?php echo "</a>"; ?>
								<!--<b><?php echo $row1['t_id'];?></b>-->
								<h3><?php echo $row1['t_email'];?></h3>
								</p>
								</div>
								<?php
							}

							$sql2="SELECT * FROM course WHERE c_name like '%$search%' or course_id like '%$search%' or semister like '%$search%'";
							$result2 =mysqli_query($data,$sql2);
							if(!$result2)
								echo "somthing wrong";
							while($row2=mysqli_fetch_array($result2))
							{
								$flag="1";
								?>
								<div class="comment-box">
								<p>
								<h2><?php echo $row2['c_name'];?></h2>
								<?php echo "<a href='courseview.php?cid=".$row2['course_id']."''> ";?><b><?php echo $row2['course_id'];?></b></a>
								</p>
								</div>
								<?php
							}
						}
						else if($flag == "0")
						{
							echo '<h1> No Match Found </h1>';
						}

					}
					
					

                ?>
                </div>
    </section>