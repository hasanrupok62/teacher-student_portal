<?php session_start();?>
<?php

	$db_host="localhost";
    $db_username="root";
    $db_password="";
    $db_name="teacher-studentportal";
    
    $data=mysqli_connect($db_host,$db_username,$db_password,$db_name);
    if(!$data){       
        echo "Connection failed";
    }
	if(isset($_POST['commentgiven']))
	{
		if(isset($_POST['commenting']))
		{
			$comment_date = $_POST['commentdate'];
			$comment_insert = $_POST['commenting'];
			
			$sqlcommentpost = "INSERT INTO comments (c_date,post_id,id,message) VALUES ('$comment_date','".$_POST['com']."','".$_SESSION['username']."','$comment_insert')";
			$resultcomment =mysqli_query($data,$sqlcommentpost);
		}
	}
	mysqli_close($data);
	header("Location: teacherhome.php?takenid=".$_POST['teachertakenid']."&secid=".$_POST['teachersecid']."");

?>