<html>
<head>
    <title>SIGN UP</title>
    <link rel="stylesheet" type="text/css" href="signuppage.css"></link>
</head>
 <?php
    $db_host="localhost";
    $db_username="root";
    $db_password="";
    $db_name="teacher-studentportal";
    
    $data=mysqli_connect($db_host,$db_username,$db_password,$db_name);
    if(!$data){       
        echo "Connection failed";
    }
   
    if(isset($_POST['signup']))
    {
        if(($_POST['password']==$_POST['confirm_password']))
        {
        $sql12="insert into student (s_name,s_id,s_email,password) values ('".$_POST['Username']."','".$_POST['id']."','".$_POST['email']."','".$_POST['password']."')";
        $rqst=$data->query($sql12);
       
        }
        else
        {
            echo "somthing wrong try again";
        }
        
         mysqli_close($data);
        if(!empty($rqst))
        {
            header("Location: index.php");
        } 

    }
        
    ?>

    
 <body>
 <div id ="container">

 <section class="sign_up" style=" background-size:100% "">
                     <form method="post" id="sign_form" >
                     <fieldset>
                        <table id="table_div">
                            <tr>
                                <td> User name</td>
                                <td> <input type="text" name="Username" placeholder="name"></td>
                            </tr>
                             <tr>
                                <td>ID</td>
                                <td> <input type="text" name="id" placeholder="uiu id" > </td>
                            </tr>
                             <tr>
                                <td>Email</td>
                                <td> <input type="text" name="email" placeholder="email@example.com"></td>
                            </tr>
                             <tr>
                                <td>Password</td>
                                <td> <input type="password" name="password" placeholder="password" required> </td>
                            </tr>
                            <tr>
                                <td>Confirm Password</td>
                                <td> <input type="password" name="confirm_password" placeholder="password" required></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="signup" value="Sign Up"></td>
                            </tr>
                        </table>
                        </fieldset>
                    </form>

</section>
 </div>
        


 </body>
 </html>

 