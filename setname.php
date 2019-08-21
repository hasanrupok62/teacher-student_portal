<?php session_start();?>
<?php 

	function setcomment($conn)
	{

		$flag=0;
		if(isset($_POST['commentsubmit']))//teacher comment insert
						{
							
							if(isset($_POST['commenting']))
							{
								$comment_date = $_POST['commentdate'];
								$comment_insert = $_POST['commenting'];
								if($flag==0 )
								{
								
								$sqlcommentpost = "INSERT INTO comments (c_date,post_id,id,message) VALUES ('$comment_date','".$_POST['com']."','".$_SESSION['username']."','$comment_insert')";
								if(!$sqlcommentpost)
									echo "can't solve";
								$resultcomment =mysqli_query($conn,$sqlcommentpost);
								$flag=1;
								}
						
							}
						}
	}
	header("Location: studentview.php");
 ?>