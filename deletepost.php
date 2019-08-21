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

					if(isset($_POST['commentdelete']))
							{
								$comment_dat = $_POST['commentid2'];
								
								echo $c;

								if($flag==0 )
								{
									$sqlpostcomment= "DELETE FROM comments  WHERE post_id='$comment_dat'";
									mysqli_query($data,$sqlpostcomment);
								$sqlcommentpost = "DELETE FROM post  WHERE post_id='$comment_dat'";
								
								if(!$sqlcommentpost)
									echo "can't solve";
								$resultcomment =mysqli_query($data,$sqlcommentpost);
								

								
								if(!$resultcomment)
									echo "no man";
								header("Location: teacherhome.php?takenid=".$_POST['teachertakenid']."&secid=".$_POST['teachersecid']."");
								$flag=1;
								}
						
							}?>