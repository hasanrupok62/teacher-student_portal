<!DOCTYPE html>
<?php session_start();
	if(!empty($_SESSION['type']=='teacher')){
    //echo "hello";
  	}
  	else{
   	 header('location: index.php');
 	 }?>
<?php include("dbconnect.php");?>
<?php include("function.php");?>
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
<div style="background-color:gray; ">
	<div class="div1">
		<div id="div2">	
	        <div class="wrapper">
				<header>
					<h1><?php echo $user=$_SESSION['username']; ?></h1>
					<nav>
						<ul id="up">
							<li><a href="teacherhome1.php">Home</a></li>
							<li><a href="teacher_settings.php">Settings</a>  </li>
							
							<li><a href="logout.php">Logout</a></li>
							
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
				<h1>TO POST SOMETHING</h1>
				<br>
				<?php
					$db_host="localhost";
				    $db_username="root";
				    $db_password="";
				    $db_name="teacher-studentportal";
				    
				    $data=mysqli_connect($db_host,$db_username,$db_password,$db_name);
				    if(!$data){       
				        echo "Connection failed";
				    }
					
					echo	"<form class='comment-box' method='POST' action='postwrite.php'>

								<input type='hidden' name='postdate' value='".date('Y-m-d H:i:s')."'>
								<textarea name='posting'></textarea><br>
								<input type='hidden' name='teachertakenid' value='".$_GET['takenid']."'>
								<input type='hidden' name='teachersecid' value='".$_GET['secid']."'>
								<input type='checkbox' name='radio' ><label style='color:black;padding-right:10px;'>Email</label>
								<button type='submit' class='btn-comment' name='postsubmit' >POST</button>
								

							</form>";




				?>
 
				<br><br>
				<h2>previous post</h2><!-- given post will be shown-->
				<br>
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
					$sqlseepost = "SELECT * FROM post NATURAL JOIN teacher where s_id IS NULL AND postcourse_id='".$_GET['secid']."' AND t_id='".$_SESSION['username']."' ORDER BY post_date DESC ";
					$result =mysqli_query($data,$sqlseepost);
					if(!$result)
						echo "Wrong";
					while($row=mysqli_fetch_array($result)) //comment section of each post
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
				                        <b><?php echo $teachername;?></b>
				                        made a post.

				                    </div>
				                
				             
				            <div class="post-description"> 
				            	
				                <p><?php echo $row['post_body'];?>
				                <?php echo "<form  method='POST' action='deletepost.php'>
									<input type='hidden' name='commentid2' value='".$row['post_id']."'>
									<input type='hidden' name='teachertakenid' value='".$_GET['takenid']."'>
									<input type='hidden' name='teachersecid' value='".$_GET['secid']."'>
									<button class='btn-delete' type='submit' name='commentdelete'>Delete</button>
									
								</form>"; ?></p>
				            </div>

				           <?php
						//
						//echo $teachername.'<br>'.$row['post_body'];
						
						//echo "<br><br>";
						if(isset($_POST['commentsubmit']))//teacher comment insert
						{
			
							if(isset($_POST['commenting']))
							{
								$comment_date = $_POST['commentdate'];
								$comment_insert = $_POST['commenting'];
								if($flag==0 )
								{
								$sqlcommentpost = "INSERT INTO comments (c_date,post_id,id,message) VALUES ('$comment_date','".$_POST['com']."','$teacherid','$comment_insert')";
								if(!$sqlcommentpost)
									echo "can't solve";
								$resultcomment =mysqli_query($data,$sqlcommentpost);
								
								if(!$resultcomment)
									echo "no man";
								$flag=1;
								}
						
							}
						}
						echo	"
						<form class='comment-box' method='POST' action='commentwriteteacher.php'>
						<input type='hidden' name='commentdate' value='".date('Y-m-d H:i:s')."'>
						<input type='hidden' name='com' value='".$row['post_id']."'>
						<input type='hidden' name='teachertakenid' value='".$_GET['takenid']."'>
						<input type='hidden' name='teachersecid' value='".$_GET['secid']."'>
						<textarea name='commenting'></textarea>
				          <button class='btn-comment' type='submit' name='commentgiven' >comment</button>
						</form>
						";//teacher comment section in html
						?>
						<div class="post-footer"><!--student and teacher comment-->
					<?php
					$sqlseepostcomment = "SELECT * FROM  comments  where  post_id='".$row['post_id']."'";
					$resul =mysqli_query($data,$sqlseepostcomment);
					while($row1=mysqli_fetch_array($resul)) //comment section of each post
					{
						if($row1['id']==$_SESSION['username'])
						{
						
							echo "<div class='comment-box'><p>";
							$givenpostid = $row1['post_id'];//techer post
							$re=mysqli_query($data,"SELECT t_name FROM teacher where t_id='".$row1['id']."'");
							$a=mysqli_fetch_array($re);
							//$teacherid = $row1['t_id'];
							$teachername=$a['t_name'];
							echo $teachername.'<br>'.$row1['c_date'].'<br>';
							echo $row1['message'];
							//echo "<br><br>";
							echo "</p>";

								
							echo "
								<form  method='POST' action='deletecomment.php'>
									<input type='hidden' name='commentid2' value='".$row1['c_id']."'>
									<input type='hidden' name='teachertakenid' value='".$_GET['takenid']."'>
									<input type='hidden' name='teachersecid' value='".$_GET['secid']."'>
									<button class='btn-delete' type='submit' name='commentdelete'>Delete</button>
								</form>
									";
							echo	"<form  method='POST' action='editcomment.php'>
									<input type='hidden' name='commentid1' value='".$row1['c_id']."'>
									<input type='hidden' name='commentdate1' value='".$row1['c_date']."'>
									<input type='hidden' name='commentpostid1' value='".$row1['post_id']."'>
									<input type='hidden' name='commenterid1' value='".$row1['id']."'>
									<input type='hidden' name='commentmsg1' value='".$row1['message']."'>
									<input type='hidden' name='teachertakenid' value='".$_GET['takenid']."'>
									<input type='hidden' name='teachersecid' value='".$_GET['secid']."'>
									<button class='btn-edit'>Edit</button>
								</form>
								</div>";

						}
						else//student post for delete comment
						{
							echo "<div class='comment-box'><p>";
							$givenpostid = $row1['post_id'];//techer post
							$re=mysqli_query($data,"SELECT s_name FROM student where s_id='".$row1['id']."'");
							$a=mysqli_fetch_array($re);
							//$studentid = $row1['s_id'];
							$studentname=$a['s_name'];
							echo $studentname.'<br>'.$row1['c_date'].'<br>';
							echo nl2br($row1['message']);
							echo "";
							echo "</p>	";
							echo "
								<form  method='POST' action='deletecomment.php'>
									<input type='hidden' name='commentid2' value='".$row1['c_id']."'>
									<input type='hidden' name='teachertakenid' value='".$_GET['takenid']."'>
									<input type='hidden' name='teachersecid' value='".$_GET['secid']."'>
									<button class='btn-delete' type='submit' name='commentdelete'>Delete</button>
								</form>
								</div>	";	
						}

					}
					?>
					</div>
					<?php
				}
					mysqli_close($data);
					
				?>
    
            </div>
        </div>
        </div>
    </div>
</div>


 </body>
</html>
