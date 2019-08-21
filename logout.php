<?php 
	session_start();
	$_SESSION['login']=0;
	if(!empty($_SESSION['type']=='student')){
		//echo "hello";
		$db_host="localhost";
	    $db_username="root";
	    $db_password="";
	    $db_name="teacher-studentportal";
	    
	    $data=mysqli_connect($db_host,$db_username,$db_password,$db_name);
	    if(!$data){       
	        echo "Connection failed";
	    }
	    if(!empty($_SESSION['notification']=='seen'))
	    {
		    $sql1="UPDATE notification SET checking='1' WHERE s_id='".$_SESSION['username']."'";
			mysqli_query($data,$sql1);
		}
	}
	session_unset();
	session_destroy();

	header("Location:index.php");
 ?>	
