<?php
	
	session_start();
  if(!empty($_SESSION['type']=='teacher')){
    //echo "hello";
  }else{
    header('location: index.php');
  }
	$u_id = $_SESSION['username'];
	include("dbconnect.php"); 
    //$type = $_SESSION['type'];
    $db_host="localhost";
    $db_username="root";
    $db_password="";
    $db_name="teacher-studentportal";
    
    $data=mysqli_connect($db_host,$db_username,$db_password,$db_name);
    if(!$data){       
        echo "Connection failed";
    }
    $query = "SELECT * FROM `teacher` WHERE  t_id = '$u_id'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    //echo $row['s_name'];
    $name = $row['t_name'];
    $id = $row['t_id'];
    $email = $row['t_email'];
   // $type = $row['type'];
    $pass = $row['t_password'];

?>

<html>
	<head>
		
    <title><?php echo $name ?></title>
	<!--<link rel="stylesheet" type="text/css" href='style2.css'>-->
    <link rel="stylesheet" type="text/css" href='demo.css'>
	</head>
	<body>
		<?php
        $db_host="localhost";
        $db_username="root";
        $db_password="";
        $db_name="teacher-studentportal";
        
        $data=mysqli_connect($db_host,$db_username,$db_password,$db_name);
        if(!$data){       
            echo "Connection failed";
        }
    if(isset($_POST['Update_password'])){
        if(($_POST['Current_password']==$pass)){
          if(($_POST['Type_Newpassword']==$_POST['Retype_password'])){
            $newpass = $_POST['Type_Newpassword'];
        
        $sql = "UPDATE `teacher` SET t_password= '$newpass' WHERE t_id = '$id'";
       
        
        if ($conn->query($sql) === TRUE) {
         //echo "Record updated successfully";
        } else {
          //echo "Error updating record: " . $conn->error;
        }

          $conn->close();
        }
      }
    }
    ///*************************

    if(isset($_POST['Update_name'])){
        if(($_POST['Current_name']==$name)){
          if(($_POST['New_name']==$_POST['Retype_name'])){
            $newname = $_POST['New_name'];
        
        $sql = "UPDATE `teacher` SET t_name= '$newname' WHERE t_id = '$id'";
       
        
        if ($conn->query($sql) === TRUE) {
         //echo "Record updated successfully";
        } else {
          //echo "Error updating record: " . $conn->error;
        }

          $conn->close();
        }
      }
    }
    ///***************************************



    if(isset($_POST['Update_Email'])){
        if(($_POST['Current_Email_address']==$email)){
          if(($_POST['New_Email_address']==$_POST['Retype_Email_address'])){
            $newemail = $_POST['New_Email_address'];
        
        $sql = "UPDATE `teacher` SET t_email= '$newemail' WHERE t_id = '$id'";
       
        
        if ($conn->query($sql) === TRUE) {
         //echo "Record updated successfully";
        } else {
          //echo "Error updating record: " . $conn->error;
        }

          $conn->close();
        }
      }
    }

 ?>
 <div>
 <div class="div1">
    <div id="div2"> 
          
        <header>
          <h1><?php echo $user=$_SESSION['username']; ?></h1>
          <nav>
            <ul id="up"> 
                    <li><a href="teacherhome1.php">Home</a></li> 
                    <li><a href="search1.php">Search</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <!--<li><a href="notification.php">Notification</a>  </li><notification work-->
              
            </ul>
    
          </nav>
        </header>
      
    </div>
  </div>
		<div class="container">
<div class="container">
    <div class="col-sm-8">
        <div class="container1">
		  <section class="sec">
    			<div id="My_account">
    			<br>
                <nav >
                    
                  <ul>
                    <li><a href="#">Name Change </a></li>
                  </ul>
                </nav>
                <!-- </div> -->
                         <form method="post" action="" ><b>
                       
                            Name:<br>
                            <input id="srhBox" type="text" name="Current_name" placeholder="Current name"><br> <br>
                             <input id="srhBox" type="text" name="New_name" placeholder="new name "><br> <br>
                              <input id="srhBox" type="text" name="Retype_name" placeholder="Retype name "><br> <br>
                              <input id="u_btn" type="submit" name="Update_name" value="Update Name"></b>
                </form>
                <nav >
                    
                  <ul>
                      <li><a href="#">Email Address Change </a></li>
                  </ul>
                </nav>



                	<form method="post" action="" ><b>
                    Email address:
                    <br>
                    <input id="srhBox" type="text" name="Current_Email_address" placeholder="Current Email_address"><br><br>
                    <input id="srhBox" type="text" name="New_Email_address" placeholder="New Email_address"><br><br>
                    <input id="srhBox" type="text" name="Retype_Email_address" placeholder="Retype Email_address"><br><br>
                    <input id="u_btn" type="submit" name="Update_Email" value="Update Email"></b>
                    </form>

                <nav >
                    
                  <ul>
                    <li><a href="#">Password Change(user) </a></li>
                  </ul>
                </nav>
                
                         <form method="post" action="" ><b>
                       
                            User password :<br>
                            <input id="srhBox" type="password" name="Current_password" placeholder="Current password"><br> <br>
                            <!-- Type(New password): -->
                            <!-- <br> -->
                            <input id="srhBox" type="password" name="Type_Newpassword" placeholder="new password"><br><br>
                             <!-- Retype(password):<br> -->
                            <input id="srhBox" type="password" name="Retype_password" placeholder="Retype password"><br><br>                        
                            <input id="u_btn" type="submit" name="Update_password" value="Update Password"></b>
                        </form>
                    </div>
		</section>
    </div>
    </div>
    </div>
		</div>
    </div>
		</body>
		</html>
