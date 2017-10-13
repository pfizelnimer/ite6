<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","authentication");
if(isset($_POST['adregister_btn']))
{
    $adusername=mysqli_real_escape_string($db, $_POST['adusername']);
    $ademail=mysqli_real_escape_string($_POST['ademail']);
    $adpassword=mysqli_real_escape_string($_POST['adpassword']);
    $adpassword2=mysqli_real_escape_string($_POST['adpassword2']);  
     if($adpassword==$adpassword2)
     {           //Create User
            $password=md5($password); //hash password before storing for security purposes
            $sql="INSERT INTO admin(username,email,password) VALUES('$adusername','$ademail','$adpassword')";
            mysqli_query($db,$sql);  
            $_SESSION['message']="You are now logged in"; 
            $_SESSION['username']=$adusername;
            header("location:admin.php");  //redirect home page
    }
    else
    {
      $_SESSION['message']="The two password do not match";   
     }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign up as Admin</title>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div class="header">
    <h1>Sign up as Admin</h1>
</div>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
<form method="post" action="regadmin.php">
  <table>
     <tr>
           <td>Username : </td>
           <td><input type="text" name="adusername" class="textInput"></td>
     </tr>
     <tr>
           <td>Email : </td>
           <td><input type="email" name="ademail" class="textInput"></td>
     </tr>
      <tr>
           <td>Password : </td>
           <td><input type="password" name="adpassword" class="textInput"></td>
     </tr>
      <tr>
           <td>Confirm Password: </td>
           <td><input type="password" name="adpassword2" class="textInput"></td>
     </tr>
      <tr>
           <td><a href="index.php"><button type="button" value="Cancel">Cancel</button></a></td>
           <td><input type="submit" name="adregister_btn" class="Register"></td>
     </tr>
  
</table>
<br />
<table>
  <tr>
           <td><a href="regadmin.php"><button type="button" value="adminsign">Admin Sign Up</button></a></td>
           
  </tr>
  <tr>
           <td><a href="regcustomer.php"><button type="button" value="cussign">Customer Sign Up</button></a></td>
           
  </tr>

</table>
</form>
</body>
</html>