<html>
<head>
    <title>SIGN UP</title>
    <link rel="stylesheet" type="text/css" href="stylel.css"></link>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css"></link>
</head>
 <?php
    $db_host="fl16db30.tk";
    $db_username="fl16db30_root";
    $db_password="011142062";
    $db_name="fl16db30_teacher-studentportal";

    $data=mysqli_connect($db_host,$db_username,$db_password,$db_name);
    if(!$data){     
        echo "Connection failed";

    }

    if(isset($_POST['signup']))
    {
             $sql11="insert into teacher (t_name,t_id,t_email,t_password) values ('".$_POST['Username']."','".$_POST['id']."','".$_POST['email']."','".$_POST['password']."')";
            
    }
         
        $rqst=$db->query($sql11);
        mysqli_close($db);
        if(!$sql11)
        {
            echo "Something wrong !!!!";
        }
        if(!$sql12)
        {
            echo "Something wrong !!!!";
        }


        else
        {
            echo "sign_up Complete";
        }
    }

    ?>

    
 <body>
 <div id ="container">

 <level>SIGNED UP AS</level>
            <br>
            <input type="checkbox"  name="teacher"/> Teacher
            <br>
            <input type="checkbox"  name="student"/> Student
            <br>
 <section class="sign_up">
                     <form method="post" >
                     <fieldset>
                        <table>
                            <tr>
                                <td> User name</td>
                                <td> <input type="text" name="Username" placeholder="name"></td>
                            </tr>
                             <tr>
                                <td>ID</td>
                                <td> <input type="text" name="id" placeholder="uiu id"> </td>
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

 