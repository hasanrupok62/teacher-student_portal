<?php

		$db_host="localhost";
    $db_username="root";
    $db_password="";
    $db_name="teacher-studentportal";
    
    $conn=mysqli_connect($db_host,$db_username,$db_password,$db_name);
    if(!$conn){       
        echo "Connection failed";
    }
	function studentaccount($username,$password){
		$db_host="localhost";
    $db_username="root";
    $db_password="";
    $db_name="teacher-studentportal";
    
    $data=mysqli_connect($db_host,$db_username,$db_password,$db_name);
    if(!$data){       
        echo "Connection failed";
    }
		$sql = "SELECT s_id,password FROM student where s_id='$username' and password='$password'";
		$result = $data->query($sql);
			
		if ($result->num_rows > 0) {
			mysqli_close($data);
    		return true;
		}
		else
		{
			mysqli_close($data);
			return false;
		}
	}
	function teacheraccount($username,$password){
			$db_host="localhost";
    $db_username="root";
    $db_password="";
    $db_name="teacher-studentportal";
    
    $data=mysqli_connect($db_host,$db_username,$db_password,$db_name);
    if(!$data){       
        echo "Connection failed";
    }
		$sql1 = "SELECT t_id,t_password FROM teacher where t_id='$username' and t_password='$password'";
		$result = $data->query($sql1);
			
		if ($result->num_rows > 0) {
			mysqli_close($data);
    		return true;
		}
		else
		{
			mysqli_close($data);
			return false;
		}
	}
	
	
?>