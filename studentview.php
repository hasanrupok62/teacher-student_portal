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
										<li><a href="snotification.php">Notification</a>  </li><!--notification work-->
							
						</ul>
		
					</nav>
				</header>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
   				
<div class="container">
    <div class="col-sm-8">
      	<div class="container1">  
        	<?php

					$flag=0;
					$db_host="localhost";
				    $db_username="root";
				    $db_password="";
				    $db_name="teacher-studentportal";
				    
				    $db=mysqli_connect($db_host,$db_username,$db_password,$db_name);
				    if(!$db){       
				        echo "Connection failed";
				    }
					//echo $_GET['courseid'];
					$sqlview="SELECT * FROM choose NATURAL JOIN takes WHERE t_id='".$_GET['tid']."' AND sec_id='".$_GET['courseid']." ' AND s_id='".$_SESSION['username']."'";
					$r=mysqli_query($db,$sqlview);
					$sqlseepost = " SELECT * FROM `post` NATURAL JOIN `teacher` WHERE s_id IS NULL AND post.t_id='".$_GET['tid']."' AND postcourse_id='".$_GET['courseid']."' ORDER BY post_date DESC ";
					//echo $_GET['tid'];
					$result =mysqli_query($db,$sqlseepost);

				    if(mysqli_num_rows($r) > 0)//for section wise view
				    {	
					
						if(!$result){		
							echo "Connection failed";
						}
						if(mysqli_num_rows($result) > 0)
						{	
							
							while($row=mysqli_fetch_array($result)) //comment section and post of each post
							{
								$givenpostid = $row['post_id'];//techer post
								$teacherid = $row['t_id'];
								$postid=$row['post_id'];
								
								$teachername=$row['t_name'];
								?>
								<div class="panel panel-white post panel-shadow">
						            
						                <div class="pull-left image">
						                    <img src="user_1.jpg" class="img-circle avatar" alt="user profile image">
						                </div>
						                <!-- for time slot-->
					                    <div class="title h5">
					                       <h3> <b><?php echo $teachername;?></b></h3>
					                        made a post.
					                    </div>
						                
						             
						            <div class="post-description"> 
						                <p><?php echo $row['post_body'];?></p>
						            </div>
				           
	            
	                
	                    		<?php 
								echo	"<fieldset>
								<form class='comment-box' method='POST' action='commentwrite.php'>
								<input type='hidden' name='commentdate' value='".date('Y-m-d H:i:s')."'>
								<input type='hidden' name='com' value='".$row['post_id']."'>
								<input type='hidden' name='teacherid' value='".$_GET['tid']."'>
								<input type='hidden' name='ucourseid' value='".$_GET['courseid']."'>

								<textarea name='commenting'></textarea>
						          <button class='btn-comment' type='submit' name='commentgiven' >comment</button>
								</form>
								</fieldset>";

								?>
								<div class="post-footer"><!--student and teacher comment-->
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
								 	$sqlgetcomment="SELECT * FROM comments where post_id='".$row['post_id']."'";
								 	$resul =mysqli_query($data,$sqlgetcomment);
								 	while($row1=mysqli_fetch_array($resul)) //comment show section of each post
									{
										if($row1['id']==$_SESSION['username'])
										{
											echo "<div class='comment-box'><p>";

											$re=mysqli_query($data,"SELECT s_name FROM student where s_id='".$row1['id']."'");
											$a=mysqli_fetch_array($re);
											if(!$re)
											{
												echo $row1['id'];
											}
											echo '<b>'.$a['s_name'].'</b><br>';
											echo $row1['c_date'].'<br>';
											echo $row1['message'];
											echo "</p></div>";
									    }
									    else
										{
											echo "<div class='comment-box'><p>";
											$givenpostid = $row1['post_id'];//techer post
											$re=mysqli_query($data,"SELECT t_name FROM teacher where t_id='".$row1['id']."'");
											$ab=mysqli_fetch_array($re);
											if(empty($ab))
											{
												$res=mysqli_query($data,"SELECT s_name FROM student where s_id='".$row1['id']."'");
											
												$a=mysqli_fetch_array($res);
												//$studentid = $row1['s_id'];
												$tname=$a['s_name'];
												echo $tname.'<br>'.$row1['c_date'].'<br>';
												echo nl2br($row1['message']);
												//echo "";
												echo "</p>	";
											}
											else
											{
											$tname=$ab['t_name'];
											echo '<b>'.$tname.'</b><br>'.$row1['c_date'].'<br>';
											echo nl2br($row1['message']);
											//echo "";
											echo "</p>	";
											}
											echo "</div>";
										}


							 ?>
							
							 <?php 
				            } ?>
				            </div>
				            <?php
				        }
			    }
			}
			    else//for only view
			    {
			    	while($row=mysqli_fetch_array($result)) //comment section and post of each post
						{
							$givenpostid = $row['post_id'];//techer post
							$teacherid = $row['t_id'];
							$postid=$row['post_id'];
							
							$teachername=$row['t_name'];
							?>
							<div class="panel panel-white post panel-shadow">
					            
					                <div class="pull-left image">
					                    <img src="user_1.jpg" class="img-circle avatar" alt="user profile image">
					                </div>
					                <!-- for time slot-->
				                    <div class="title h5">
				                       <h3> <b><?php echo $teachername;?></b></h3>
				                        made a post.
				                    </div>
					                
					             
					            <div class="post-description"> 
					                <p><?php echo $row['post_body'];?></p>
					            </div>
			           
            
                
                    		
							<div class="post-footer"><!--student and teacher comment-->
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
							 	$sqlgetcomment="SELECT * FROM comments where post_id='".$row['post_id']."'";
							 	$resul =mysqli_query($data,$sqlgetcomment);
							 	while($row1=mysqli_fetch_array($resul)) //comment show section of each post
								{
									$flag=0;
									$db_host="localhost";
								    $db_username="root";
								    $db_password="";
								    $db_name="teacher-studentportal";
								    
								    $data=mysqli_connect($db_host,$db_username,$db_password,$db_name);
								    if(!$data){       
								        echo "Connection failed";
								    }
									echo "<div class='comment-box'><p>";

									$re=mysqli_query($data,"SELECT s_name FROM student where s_id='".$row1['id']."'");
									$a=mysqli_fetch_array($re);
									if(!$re)
									echo $row1['id'];
									echo '<b>'.$a['s_name'].'</b><br>';
									echo $row1['c_date'].'<br>';
									echo $row1['message'];
									echo "</p></div>";
								}


						 ?>
						</div>
						 <?php 
			            }
			        }
			    
			            ?>
             
                
            </div>
        </div>
        </div>
    </div>
</div>

				


</body>
</html>
<?php

?>