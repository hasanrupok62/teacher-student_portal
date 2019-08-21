<?php session_start();
	

?>
<?php

	$db_host="localhost";
	$db_username="root";
	$db_password="";
	$db_name="teacher-studentportal";

	$data=mysqli_connect($db_host,$db_username,$db_password,$db_name);
	if(!$data){		
		echo "Connection failed";

	}
	if(isset($_POST['postsubmit']) && isset($_POST['radio']) )
		{
			
//post for email will be here
			if(isset($_POST['posting']) && isset($_POST['radio']) )
			{
				echo "paros na";
				$post_date = $_POST['postdate'];
				$post_insert = $_POST['posting'];
				//$id= rand(1000,9999);
		
				$sqlcourse = "INSERT INTO post (post_date,post_body,t_id,s_id,postcourse_id) VALUES ('$post_date','$post_insert','".$_SESSION['username']."',NULL,'".$_POST['teachersecid']."')";
				
				$res =mysqli_query($data,$sqlcourse);
				if(!$res)
					echo"Something wrong";
				$x=$_POST['teachersecid'];
				$sqlchoos="SELECT * FROM choose WHERE sec_id='".$_POST['teachersecid']."'";
				$result=mysqli_query($data,$sqlchoos);

				while($row=mysqli_fetch_array($result))
				{
					$sqlnotification="INSERT INTO notification ( s_id, t_id, sec_id, post_body,post_date ,checking) VALUES ( '".$row['s_id']."', '".$_SESSION['username']."', '".$_POST['teachersecid']."', '$post_insert', '$post_date','0')";
					mysqli_query($data,$sqlnotification);
					$sqlsid="SELECT * FROM student WHERE s_id='".$row['s_id']."'";
				    $ab=mysqli_query($data,$sqlsid);

				    while($rows=mysqli_fetch_array($ab))
				   	{
				   		echo $rows['s_email'];
				   	}
				  	$sqltid="SELECT * FROM teacher WHERE t_id='".$_SESSION['username']."'";
				    	$abcd=mysqli_query($data,$sqltid);

				    while($rowtid=mysqli_fetch_assoc($abcd))
				    {
				    	echo $rowtid['t_email'];
				    }

			         $to = $rows['s_email'];
			         $subject = $row['course_id'];
			         echo $to;
			         $email= $rowtid['t_email'];
			         echo $email;
			        // $message .= "<h1>This is headline.</h1>";
			         
			         $header = "From: $email \r\n";
			         $header .= "Cc:afgh@somedomain.com \r\n";
			         $header .= "MIME-Version: 1.0\r\n";
			         $header .= "Content-type: text/html\r\n";
			         
			         $retval = mail ($to,$subject,$message,$header);
			         
			         
			        
			         
			        
			         
				}

			}
		}
	else
	{
		if(isset($_POST['postsubmit']))
			{
				$post_date = $_POST['postdate'];
				$post_insert = $_POST['posting'];
				//$id= rand(1000,9999);
		
				$sqlcourse = "INSERT INTO post (post_date,post_body,t_id,s_id,postcourse_id) VALUES ('$post_date','$post_insert','".$_SESSION['username']."',NULL,'".$_POST['teachersecid']."')";
				
				$res =mysqli_query($data,$sqlcourse);
				if(!$res)
					echo"Something wrong";
				$x=$_POST['teachersecid'];
				$sqlchoos="SELECT * FROM choose WHERE sec_id='".$_POST['teachersecid']."'";
				$result=mysqli_query($data,$sqlchoos);

				while($row=mysqli_fetch_array($result))
				{
					$sqlnotification="INSERT INTO notification ( s_id, t_id, sec_id, post_body,post_date ,checking) VALUES ( '".$row['s_id']."', '".$_SESSION['username']."', '".$_POST['teachersecid']."', '$post_insert', '$post_date','0')";
					mysqli_query($data,$sqlnotification);
				}

			}
	}
	mysqli_close($data);
	header("Location: teacherhome.php?takenid=".$_POST['teachertakenid']."&secid=".$_POST['teachersecid']."");

?>