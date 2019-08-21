<!DOCTYPE html>
<?php session_start();?>
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

<body>


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
	if(isset($_POST['commentsubmit']))//teacher comment insert
						{
			
							if(isset($_POST['ucommenting']))
							{
								$comment_dat = $_POST['ucommentid1'];
								$comment_insert = $_POST['ucommenting'];
								$c = $_POST['ucommentpostid1'];
								echo $c;

								if($flag==0 )
								{
								$sqlcommentpost = "UPDATE comments SET message='$comment_insert' WHERE c_id='$comment_dat'";
								if(!$sqlcommentpost)
									echo "can't solve";
								$resultcomment =mysqli_query($data,$sqlcommentpost);
								
								if(!$resultcomment)
									echo "no man";
								header("Location: teacherhome.php?takenid=".$_POST['id']."&secid=".$_POST['secid']);
								$flag=1;
								}
						
							}
						}

echo	"<form class='comment-box' method='POST' action='editcomment.php'>
						<input type='hidden' name='ucommentid1' value='".$_POST['commentid1']."'>
						<input type='hidden' name='ucommentdate1' value='".$_POST['commentdate1']."'>
						<input type='hidden' name='ucommentpostid1' value='".$_POST['commentpostid1']."'>
						<input type='hidden' name='ucommenterid1' value='".$_POST['commenterid1']."'>
						<input type='hidden' name='id' value='".$_POST['teachertakenid']."'>
						<input type='hidden' name='secid' value='".$_POST['teachersecid']."'>
						<textarea name='ucommenting'>".$_POST['commentmsg1']."</textarea>
				        <button class='btn-comment' type='submit' name='commentsubmit' >edit</button>
						</form>";
								?>
</body>
</html>